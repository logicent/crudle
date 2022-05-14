<?php

use crudle\app\helpers\App;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'yii2-crudle-cli',
    'runtimePath' => '@storage/runtime',
    'vendorPath' => '@crudle/vendor',
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
                'host' => App::env('CRUDLE_MAIL_HOST'),
                'port' => App::env('CRUDLE_MAIL_PORT'),
                'encryption' => App::env('CRUDLE_MAIL_ENCRYPTION'),
                'username' => App::env('CRUDLE_MAIL_USERNAME'),
                'password' => App::env('CRUDLE_MAIL_PASSWORD'),
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
        'allowedIPs' => ['192.168.*.*', '172.16.*.*', '10.*.*.*', '127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'kit';
    $config['modules']['kit'] = [
        'class' => 'crudle\kit\Module',
        'allowedIPs' => ['192.168.*.*', '172.16.*.*', '10.*.*.*', '127.0.0.1', '::1'],
    ];
}

return $config;
