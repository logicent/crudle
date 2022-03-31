<?php

Yii::setAlias('@app_modules',   dirname( __DIR__ ) . '/modules');
Yii::setAlias('@app_setup',     dirname( __DIR__ ) . '/modules/setup');
// @app_settings GeneralSettings + Layout Settings
Yii::setAlias('@app_website',   dirname( __DIR__ ) . '/modules/website');
Yii::setAlias('@system_modules', dirname (dirname( __DIR__ )) . '/modules');
// Yii::setAlias('@custom_modules', dirname (dirname( __DIR__ )) . '/user_modules');

return [
    'setup'     => [
        'class' => app\modules\setup\Module::class,
    ],
    'website'   => app\modules\website\Module::class,
];
