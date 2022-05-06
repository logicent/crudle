<?php
require_once __DIR__ . '/../helpers/AppHelper.php';

use crudle\app\helpers\AppHelper;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();

return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',

    'user.passwordResetTokenExpire' => 3600,

    'appName' => AppHelper::env('APP_NAME'),
    'appShortName' => '',
    'appDescription' => 'Enterprise application web development starter kit',
    'appWebsite' => 'https://github.com/logicent/yii2-crudle',
    'appCopyright' => '&copy; 2020 Appsoft',

    'appVersion' => '1.0.0-beta',
    'mobileAppVersion' => 'N/A',
    'appDeveloper' => '@mwaigichuhi',

    'helpUrl' => 'https://github.com/logicent/yii2-crudle/wiki',

    'flashMessagePositionY' => 'bottom',
    'flashMessagePositionX' => 'right',
    'flashMessageDuration' => 6000
];
