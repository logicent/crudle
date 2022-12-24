<?php

use crudle\app\main\helpers\App;

$siteId = App::env('SITE_ID');

$db = require __DIR__ . '/db.php';
$modules = require dirname(__DIR__, 1) . "/{$siteId}/config/modules.php";

$config = [
    'name' => App::env('SITE_APP_NAME'),
    'runtimePath' => "@crudle/sites/{$siteId}/storage/runtime",
    // 'basePath' => dirname( __DIR__ ),
    'timeZone' => App::env('SITE_TIME_ZONE'),
    'components' => [
        'db' => $db,
        'formatter' => [
            'defaultTimeZone' => App::env('SITE_TIME_ZONE'),
        ],
    ],
    'modules' => $modules,
];

// dynamically append rules via Module bootstrap($app)
foreach ($modules as $id => $class) {
    $config['bootstrap'][] = $id;
}

return $config;
