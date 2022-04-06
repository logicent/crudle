<?php

Yii::setAlias('@app_modules', dirname( __DIR__ ) . '/modules');
Yii::setAlias('@app_main', dirname( __DIR__ ) . '/modules/main');
Yii::setAlias('@app_setup', dirname( __DIR__ ) . '/modules/setup');
// @app_settings GeneralSettings + Layout Settings
// Yii::setAlias('@app_website', dirname( __DIR__ ) . '/modules/website');
Yii::setAlias('@system_modules', dirname (__DIR__, 2) . '/modules');
// Yii::setAlias('@custom_modules', dirname (__DIR__, 2) . '/user_modules');

return [
    'main'      => app\modules\main\Module::class,
    'setup'     => [
        'class' => app\modules\setup\Module::class,
    ],
    'website'   => website\Module::class,
];
