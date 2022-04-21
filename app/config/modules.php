<?php

Yii::setAlias('@app_modules', dirname( __DIR__ ) . '/modules');
Yii::setAlias('@app_main', '@app_modules/main');
Yii::setAlias('@app_setup', '@app_modules/setup');
// @app_settings GeneralSettings + Layout Settings
Yii::setAlias('@system_modules', dirname (__DIR__, 2) . '/modules');
Yii::setAlias('@app_website', '@system_modules/website');
// Yii::setAlias('@custom_modules', dirname (__DIR__, 2) . '/user_modules');

return [
    // core modules
    'main'      => crudle\main\Module::class,
    'setup'     => crudle\setup\Module::class,
    'website'   => website\Module::class,
    // custom modules
];
