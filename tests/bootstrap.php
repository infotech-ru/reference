<?php

define('YII_DEBUG', true);
$_SERVER['SCRIPT_NAME'] = '/'.__DIR__;
$_SERVER['SCRIPT_FILENAME'] = __FILE__;

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../vendor/yiisoft/yii2/Yii.php';

Yii::setAlias('@tests', __DIR__);

$app = new \yii\console\Application(
    [
        'id' => 'id',
        'basePath' => __DIR__,
        'components' => [
            'ref_db' => [
                'class' => \yii\db\Connection::class,
                'dsn' => 'mysql:host=127.0.0.1;dbname=autocrm',
                'username' => 'root',
                'password' => '',
                'charset' => 'utf8',
            ],
        ],
    ]
);