<?php
return [
    'id' => 'id',
    'basePath' => __DIR__,
    'controllerMap' => [
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationPath' => [
                __DIR__.'/../migrations',
            ],
            'db' => 'ref_db',
            'migrationTable' => 'eqt_migration',
        ],
    ],
    'components' => [
        'ref_db' => [
            'class' => \yii\db\Connection::class,
            'dsn' => 'mysql:host=127.0.0.1;dbname=autocrm_test',
            'username' => 'root',
            'password' => 'qweasdzxc',
            'charset' => 'utf8',
        ],
    ],
];