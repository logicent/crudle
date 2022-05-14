<?php

use crudle\app\helpers\App;

return [
    'class' => 'yii\db\Connection',
    'dsn' => App::env('CRUDLE_DB_DSN'), // ?: null
    'username' => App::env('CRUDLE_DB_USERNAME'),
    'password' => App::env('CRUDLE_DB_PASSWORD'),
    'tablePrefix' => App::env('CRUDLE_DB_TABLE_PREFIX'),
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    // 'enableSchemaCache' => true,
    // 'schemaCacheDuration' => 60,
    // 'schemaCache' => 'cache',
];
