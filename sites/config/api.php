<?php

// use crudle\app\main\helpers\App;
// use crudle\app\main\models\auth\User;

// $params = require __DIR__ . '/params.php';
// $db = require __DIR__ . '/db.php';
$routes = require __DIR__ . '/api/routes.php';
// $modules = require __DIR__ . '/modules.php';

$config = [
    'id' => 'crudle-api',
    // 'name' => App::env('CRUDLE_APP_NAME'),
    // 'runtimePath' => '@storage/runtime',
    // 'vendorPath' => '@crudle/vendor',
    // 'basePath' => dirname( __DIR__ ),

    // 'bootstrap' => ['log'],

    // 'timeZone' => 'Africa/Nairobi',
    'defaultRoute' => 'main/api/index',

    // 'aliases' => [
    //     '@bower' => '@vendor/bower-asset',
    //     '@npm'   => '@vendor/npm-asset',
    // ],
    'components' => [
        // 'assetManager' => [
        //     'appendTimestamp' => true,
        // ],
        // 'request' => [
        //     // !!! secret key - this is required by cookie validation
        //     'cookieValidationKey' => 'ohr2Bs_O7Dopc_LcWy3BMv7BiZOZ5fpe',
        //     // Let the API accept input data in JSON format
        //     'parsers' => [
        //         'application/json' => 'yii\web\JsonParser',
        //     ]
        // ],
        // 'cache' => [
        //     'class' => 'yii\caching\FileCache',
        // ],
        // 'authManager' => [
        //     'class' => 'yii\rbac\DbManager',
        // ],
        // 'user' => [
        //     'identityClass' => User::class,
        //     'enableAutoLogin' => true,
        //     // 'loginUrl' => 'app/login'
        // ],
        // 'errorHandler' => [
        //     'errorAction' => 'main/app/error',
        // ],
        // 'mailer' => [
        //     'class' => 'yii\swiftmailer\Mailer',
        //     'useFileTransport' => false, // set true if testing or debugging to send locally to file
        //     'transport' => [
        //         'class' => 'Swift_SmtpTransport',
        //         'host' => App::env('CRUDLE_MAIL_HOST'),
        //         'port' => App::env('CRUDLE_MAIL_PORT'),
        //         'encryption' => App::env('CRUDLE_MAIL_ENCRYPTION'),
        //         'username' => App::env('CRUDLE_MAIL_USERNAME'),
        //         'password' => App::env('CRUDLE_MAIL_PASSWORD'),
        //     ],
        // ],
        // 'log' => [
        //     'traceLevel' => YII_DEBUG ? 3 : 0,
        //     'targets' => [
        //         [
        //             'class' => 'yii\log\FileTarget',
        //             'levels' => ['error', 'warning'],
        //         ],
        //     ],
        // ],
        // 'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            // 'enableStrictParsing' => true,
            'showScriptName' => false,
            // scriptUrl?
            // baseUrl?
            'rules' => $routes,
        ],
        // 'formatter' => [
        //     'defaultTimeZone' => 'Africa/Nairobi',
        // ],
    ],
    // 'modules' => $modules,
    // 'params' => $params,
];

// if (YII_ENV_DEV) {
//     // configuration adjustments for 'dev' environment
//     $config['bootstrap'][] = 'debug';
//     $config['modules']['debug'] = [
//         'class' => 'yii\debug\Module',
//         'allowedIPs' => ['192.168.*.*', '172.16.*.*', '10.*.*.*', '127.0.0.1', '::1'],
//     ];
// }

return $config;
