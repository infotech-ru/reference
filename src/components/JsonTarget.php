<?php

namespace infotech\reference\components;

use Throwable;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\VarDumper;
use yii\log\FileTarget;
use yii\log\Logger;
use yii\web\HttpException;
use yii\web\Request;

class JsonTarget extends FileTarget
{
    public $microtime = true;

    public function getContextMessage(): string
    {
        return '';
    }

    public function formatMessage($message): string
    {
        list($text, $level, $category, $timestamp) = $message;
        $level = Logger::getLevelName($level);
        $statusCode = 200;
        if (!is_string($text)) {
            if ($text instanceof HttpException) {
                $statusCode = $text->statusCode;
                $level = 'info';
            }
            // exceptions may not be serializable if in the call stack somewhere is a Closure
            if ($text instanceof Throwable) {
                $text = (string)$text;
            } else {
                $text = VarDumper::export($text);
            }
        }
        $traces = [];
        if (isset($message[4])) {
            foreach ($message[4] as $trace) {
                $traces[] = "{$trace['file']}:{$trace['line']}";
            }
        }

        $logVars = [];
        $context = ArrayHelper::filter($GLOBALS, $this->logVars);
        foreach ($context as $key => $value) {
            $logVars[$key] = $value;
        }

        $request = Yii::$app->getRequest();
        if ($request instanceof Request) {
            $logVars['Body'] = $request->rawBody;
        }

        $user = Yii::$app->has('user', true) ? Yii::$app->get('user') : null;
        $userId = $user ? $user->getId() : null;

        if (isset($_SERVER['REQUEST_TIME_FLOAT'])) {
            $duration = microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'];
        } else {
            $duration = null;
        }

        $value = [
            'message' => $text,
            'level' => $level,
            'category' => $category,
            'timestamp' => $this->getTime($timestamp),
            'traces' => $traces,
            'context' => $logVars,
            'duration' => $duration,
            'http' => [
                'status_code' => $statusCode,
                'user_id' => $userId,
            ]
        ];

        return Json::encode($value, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE);
    }
}
