<?php

use crudle\app\main\helpers\App;

return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',

    'user.passwordResetTokenExpire' => 3600,

    'appName' => App::env('CRUDLE_APP_NAME'),
    'appShortName' => '',
    'appDescription' => 'Web application development starter kit',
    'appWebsite' => 'https://github.com/logicent/crudle',
    'appCopyright' => '&copy; 2020 Appsoft',

    'appVersion' => '1.0.0-beta',
    'mobileAppVersion' => 'N/A',
    'appDeveloper' => '@mwaigichuhi',

    'helpUrl' => 'https://github.com/logicent/crudle/wiki',

    'flashMessagePositionY' => 'bottom',
    'flashMessagePositionX' => 'right',
    'flashMessageDuration' => 6000
];
