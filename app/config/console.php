<?php

require_once __DIR__ . '/../helpers/AppHelper.php';

use crudle\app\helpers\AppHelper;

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
    'controllerNamespace' => 'crudle\app\setup\commands',
    // 'controllerMap' => [
    //     'batch' => [
    //         'class' => 'schmunk42\giiant\commands\BatchController',
    //         'overwrite' => true,
    //         'modelNamespace' => 'app\\modules\\crud\\models',
    //         'crudTidyOutput' => true,
    //     ]
    // ],
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
                'host' => AppHelper::env('MAIL_HOST'),
                'port' => AppHelper::env('MAIL_PORT'),
                'encryption' => AppHelper::env('MAIL_ENCRYPTION'),
                'username' => AppHelper::env('MAIL_USERNAME'),
                'password' => AppHelper::env('MAIL_PASSWORD'),
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
