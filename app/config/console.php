<?php

require_once __DIR__ . '/../helpers/App.php';

use app\helpers\App;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'yii2-crudle-cli',
    'runtimePath' => dirname( dirname( __DIR__ ) ) . '/storage/runtime',
    'vendorPath' => dirname( dirname( __DIR__ ) ) . '/vendor',
    'basePath' => dirname( __DIR__ ),
    'bootstrap' => ['log'],
    'timeZone' => 'Africa/Nairobi',
    'controllerNamespace' => 'crudle\setup\commands',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
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
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'db' => $db,
    ],
    'params' => $params,

    'controllerMap' => [
        'migration' => [
            'class' => 'bizley\migration\controllers\MigrationController',
        ],
        // 'fixture' => [ // Fixture generation command line.
        //     'class' => 'yii\faker\FixtureController',
        // ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
