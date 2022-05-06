<?php

Yii::setAlias('@app_modules', dirname( __DIR__ ) . '/modules');
Yii::setAlias('@app_main', '@app_modules/main');
Yii::setAlias('@app_setup', '@app_modules/setup');
// @app_settings GeneralSettings + Layout Settings
Yii::setAlias('@app_kit', dirname (__DIR__, 2) . '/codegen');
Yii::setAlias('@sys_modules', dirname (__DIR__, 2) . '/modules');
Yii::setAlias('@app_cms', '@sys_modules/cms');

return [
    // core modules
    'main'  => crudle\app\main\Module::class,
    'setup' => crudle\app\setup\Module::class,
    // code module
    'kit' => crudle\kit\Module::class,
    // extra modules
    'cms'   => crudle\ext\cms\Module::class,
];
