<?php

Yii::setAlias('@appModules', dirname( __DIR__ ) . '/modules');
Yii::setAlias('@appMain', '@appModules/main');
Yii::setAlias('@appSetup', '@appModules/setup');
// @appSettings GeneralSettings + Layout Settings
Yii::setAlias('@appKit', dirname (__DIR__, 2) . '/codegen');
Yii::setAlias('@extModules', dirname (__DIR__, 2) . '/modules');
Yii::setAlias('@webCms', '@extModules/web_cms');

return [
    // core modules
    'main'  => crudle\app\main\Module::class,
    'setup' => crudle\app\setup\Module::class,
    // code module
    'kit' => crudle\kit\Module::class,
    // user modules
    'web-cms'   => crudle\ext\web_cms\Module::class,
];
