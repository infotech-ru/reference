<?php

namespace infotech\reference\tests\unit\components;

use infotech\reference\components\LogstashTarget;
use PHPUnit\Framework\TestCase;
use yii\log\Logger;

class LogstashTargetTest extends TestCase
{
    public function testFormatMessage()
    {
        $model = new LogstashTarget();
        $this->assertEquals(
            '{"message":"text","level":"error","category":"category","timestamp":"2018-06-13T13:27:19+00:00"}',
            $model->formatMessage(['text', Logger::LEVEL_ERROR, 'category', 1528896439])
        );
        $this->assertEquals(
            '{"message":"text","level":"error","category":"category",'
            . '"timestamp":"2018-06-13T13:27:19+00:00","trace":["line1","line2"]}',
            $model->formatMessage(['text', Logger::LEVEL_ERROR, 'category', 1528896439, ['line1', 'line2']])
        );
        $this->assertEquals(
            '{"item":"array","level":"error","category":"category","timestamp":"2018-06-13T13:27:19+00:00"}',
            $model->formatMessage([['item' => 'array'], Logger::LEVEL_ERROR, 'category', 1528896439])
        );
        $this->assertEquals(
            '{"message":{"property":"object"},"level":"error","category":"category",'
            . '"timestamp":"2018-06-13T13:27:19+00:00"}',
            $model->formatMessage([(object)['property' => 'object'], Logger::LEVEL_ERROR, 'category', 1528896439])
        );
        $this->assertEquals(
            '{"message":"Warning, wrong log message type \'boolean\'","level":"error","category":"category",'
            . '"timestamp":"2018-06-13T13:27:19+00:00"}',
            $model->formatMessage([false, Logger::LEVEL_ERROR, 'category', 1528896439])
        );
    }

    public function testEmergencyExport()
    {
        $path = tempnam(sys_get_temp_dir(), 'tmp');
        $model = new LogstashTarget(
            ['emergencyLogFile' => $path, 'messages' => [['text', Logger::LEVEL_ERROR, 'category', 1528896439]]]
        );
        $model->emergencyExport([]);
        $this->assertEquals(
            '{"message":"text","emergency":[],"level":"error","category":"category",'
            . '"timestamp":"2018-06-13T13:27:19+00:00"}' . PHP_EOL,
            file_get_contents($path)
        );
        @unlink($path);
    }
}
