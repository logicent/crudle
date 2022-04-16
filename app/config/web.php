<?php

require_once __DIR__ . '/../helpers/App.php';

use app\helpers\App;
use app\modules\main\models\auth\User;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$url = require __DIR__ . '/url.php';
$modules = require __DIR__ . '/modules.php';

$config = [
    'id' => 'yii2-crudle-web',
    // 'name' => 'Yii2 Crudle Web',
    'runtimePath' => dirname( dirname( __DIR__ ) ) . '/storage/runtime',
    'vendorPath' => dirname( dirname( __DIR__ ) ) . '/vendor',
    'basePath' => dirname( __DIR__ ),
    'layoutPath' =>  '@app_main/views/_layouts',

    'bootstrap' => ['log'],

    'timeZone' => 'Africa/Nairobi',
    // 'defaultRoute' => 'main/app/index',

    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'assetManager' => [
            'appendTimestamp' => true,
        ],
        'request' => [
            // !!! secret key - this is required by cookie validation
            'cookieValidationKey' => 'ohr2Bs_O7Dopc_LcWy3BMv7BiZOZ5fpe',
            // Let the API accept input data in JSON format
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'user' => [
            'identityClass' => User::class,
            'enableAutoLogin' => true,
            // 'loginUrl' => 'app/login'
        ],
        'errorHandler' => [
            'errorAction' => 'main/app/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false, // set true if testing or debugging to send locally to file
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => App::env('MAIL_HOST'),
                'port' => App::env('MAIL_PORT'),
                'encryption' => App::env('MAIL_ENCRYPTION'),
                'username' => App::env('MAIL_USERNAME'),
                'password' => App::env('MAIL_PASSWORD'),
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => $url,
        'formatter' => [
            'defaultTimeZone' => 'Africa/Nairobi',
        ],
    ],
    'modules' => $modules,
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['192.168.*.*', '172.16.*.*', '10.*.*.*', '127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['192.168.*.*', '172.16.*.*', '10.*.*.*', '127.0.0.1', '::1'],
    ];
}

return $config;
