<?php

namespace infotech\reference\components;

use Exception;
use Yii;
use yii\helpers\ArrayHelper;
use yii\log\Logger;
use yii\log\Target;
use yii\web\Request;

class LogstashTarget extends Target
{
    /** @var string Connection configuration to Logstash. */
    public $dsn = 'tcp://localhost:3333';

    /** @var array Add more context */
    public $context = [];

    /** @var string Alias of log file. */
    public $emergencyLogFile = '@runtime/logs/logService.log';

    /**
     * Processes the given log messages.
     *
     * @param array $messages Log messages to be processed.
     * @param bool $final Whether this method is called at the end of the current application
     */
    public function collect($messages, $final)
    {
        $this->messages = array_merge(
            $this->messages,
            $this->filterMessages($messages, $this->getLevels(), $this->categories, $this->except)
        );
        $count = count($this->messages);
        if (($count > 0) && (($final == true) || ($this->exportInterval > 0) && ($count >= $this->exportInterval))) {
            $this->addContextToMessages();
            $this->export();
            $this->messages = [];
        }
    }

    /**
     * Updates all messages if there are context variables.
     */
    protected function addContextToMessages()
    {
        $context = $this->getContextMessage();
        $request = Yii::$app->request;
        if ($request instanceof Request) {
            $context['rawBody'] = $request->getRawBody();
        }

        if (!$context) {
            return;
        }

        foreach ($this->messages as &$message) {
            $message[0] = ArrayHelper::merge($context, $this->parseText($message[0]));
        }
    }

    /**
     * Generates the context information to be logged.
     *
     * @return array
     */
    protected function getContextMessage()
    {
        $context = $this->context;

        foreach ($this->logVars as $name) {
            if (!empty($GLOBALS[$name])) {
                $context[$name] = &$GLOBALS[$name];
            }
        }

        return $context;
    }

    /**
     * Convert's any type of log message to array.
     *
     * @param mixed $text Input log message.
     *
     * @return array
     */
    protected function parseText($text)
    {
        $type = gettype($text);
        switch ($type) {
            case 'array':
                return $text;
            case 'string':
                return ['message' => $text];
            case 'object':
                if ($text instanceof Exception) {
                    return [
                        'trace' => $text->getFile() . ':' . $text->getLine() . PHP_EOL . $text->getTraceAsString(),
                        'message' => $text->getMessage(),
                    ];
                }

                return ['message' => get_object_vars($text)];
            default:
                return ['message' => Yii::t('yii', "Warning, wrong log message type '{$type}'")];
        }
    }

    /**
     * @inheritdoc
     */
    public function export()
    {
        try {
            $socket = stream_socket_client($this->dsn, $errorNumber, $error, 3);

            foreach ($this->messages as &$message) {
                fwrite($socket, $this->formatMessage($message) . PHP_EOL);
            }

            fclose($socket);
        } catch (Exception $error) {
            $this->emergencyExport(
                [
                    'dsn' => $this->dsn,
                    'error' => $error->getMessage(),
                    'errorNumber' => $error->getCode(),
                    'trace' => $error->getTraceAsString(),
                ]
            );
        }
    }

    /**
     * Formats a log message.
     *
     * @param array $message The log message to be formatted.
     *
     * @return string
     */
    public function formatMessage($message)
    {
        return json_encode($this->prepareMessage($message));
    }

    /**
     * Transform log message to assoc.
     *
     * @param array $message The log message.
     *
     * @return array
     */
    protected function prepareMessage($message)
    {
        list($text, $level, $category, $timestamp) = $message;

        $level = Logger::getLevelName($level);
        $timestamp = date('c', $timestamp);

        $result = ArrayHelper::merge(
            $this->parseText($text),
            ['level' => $level, 'category' => $category, 'timestamp' => $timestamp]
        );

        if (!empty($message[4])) {
            $result['trace'] = $message[4];
        }

        return $result;
    }

    /**
     * @param array $data Additional information to log messages from target.
     */
    public function emergencyExport($data)
    {
        $this->emergencyPrepareMessages($data);
        $text = implode(PHP_EOL, array_map([$this, 'formatMessage'], $this->messages)) . PHP_EOL;

        file_put_contents(Yii::getAlias($this->emergencyLogFile), $text, FILE_APPEND);
    }

    /**
     * @param array $data Additional information to log messages from target.
     */
    protected function emergencyPrepareMessages($data)
    {
        foreach ($this->messages as &$message) {
            $message[0] = ArrayHelper::merge($this->parseText($message[0]), ['emergency' => $data]);
        }
    }
}
