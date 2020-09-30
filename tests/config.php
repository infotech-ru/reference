<?php

return [
    'id' => 'id',
    'basePath' => __DIR__,
    'controllerMap' => [
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationPath' => [
                __DIR__ . '/../migrations',
            ],
            'db' => 'ref_db',
            'migrationTable' => 'eqt_migration',
        ],
    ],
    'components' => [
        'ref_db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=autocrm',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
    ],
];
