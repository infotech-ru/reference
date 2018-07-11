<?php

define('YII_DEBUG', true);
$_SERVER['SCRIPT_NAME'] = '/'.__DIR__;
$_SERVER['SCRIPT_FILENAME'] = __FILE__;

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../vendor/yiisoft/yii2/Yii.php';

Yii::setAlias('@tests', __DIR__);

$app = new \yii\console\Application(require __DIR__.'/config.php');