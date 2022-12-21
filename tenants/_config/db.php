<?php

use crudle\app\main\helpers\App;

return [
    'class' => 'yii\db\Connection',
    'dsn' => App::env('TENANT_DB_DSN'), // ?: null
    'username' => App::env('TENANT_DB_USERNAME'),
    'password' => App::env('TENANT_DB_PASSWORD'),
    'tablePrefix' => App::env('TENANT_DB_TABLE_PREFIX'),
    // 'enableQueryCache' => false,
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    // 'enableSchemaCache' => true,
    // 'schemaCacheDuration' => 60,
    // 'schemaCache' => 'cache',
];
