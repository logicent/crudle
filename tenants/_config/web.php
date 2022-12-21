<?php

use crudle\app\main\helpers\App;

$tenantId = App::env('TENANT_ID');

$db = require __DIR__ . '/db.php';
$modules = require dirname(__DIR__, 1) . "/{$tenantId}/config/modules.php";

$config = [
    'name' => App::env('TENANT_APP_NAME'),
    'runtimePath' => "@crudle/tenants/{$tenantId}/storage/runtime",
    // 'basePath' => dirname( __DIR__ ),
    'timeZone' => App::env('TENANT_TIME_ZONE'),
    'components' => [
        'db' => $db,
        'formatter' => [
            'defaultTimeZone' => App::env('TENANT_TIME_ZONE'),
        ],
    ],
    'modules' => $modules,
];

// dynamically append rules via Module bootstrap($app)
foreach ($modules as $id => $class) {
    $config['bootstrap'][] = $id;
}

return $config;
