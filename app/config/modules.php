<?php

Yii::setAlias('@app_modules', dirname( __DIR__ ) . '/modules');
Yii::setAlias('@app_main', '@app_modules/main');
Yii::setAlias('@app_setup', '@app_modules/setup');
// @app_settings GeneralSettings + Layout Settings
Yii::setAlias('@app_kit', dirname (__DIR__, 2) . '/codegen');
Yii::setAlias('@sys_modules', dirname (__DIR__, 2) . '/modules');
Yii::setAlias('@app_cms', '@sys_modules/cms');
// Yii::setAlias('@user_modules', dirname (__DIR__, 2) . '/user_modules');

return [
    // core modules
    'main'  => crudle\main\Module::class,
    'setup' => crudle\setup\Module::class,
    // std modules
    'cms'   => logicent\cms\Module::class,
    // custom modules
];
