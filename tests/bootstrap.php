<?php

use yii\console\Application;
use yii\helpers\ArrayHelper;

define('YII_DEBUG', true);
$_SERVER['SCRIPT_NAME'] = '/' . __DIR__;
$_SERVER['SCRIPT_FILENAME'] = __FILE__;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

Yii::setAlias('@tests', __DIR__);

$config = require(__DIR__ . '/config.php');
if (file_exists(__DIR__ . '/config-local.php')) {
    $config = ArrayHelper::merge($config, require(__DIR__ . '/config-local.php'));
}

$app = new Application($config);
