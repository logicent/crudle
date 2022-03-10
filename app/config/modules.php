<?php

Yii::setAlias('@app_modules',   dirname( __DIR__ ) . '/modules');
Yii::setAlias('@app_service', dirname( __DIR__ ) . '/modules/integration');
Yii::setAlias('@app_customize', dirname( __DIR__ ) . '/modules/customize');
Yii::setAlias('@app_setup',     dirname( __DIR__ ) . '/modules/setup');
Yii::setAlias('@app_website',   dirname( __DIR__ ) . '/modules/website');
Yii::setAlias('@system_modules', dirname (dirname( __DIR__ )) . '/modules');
// Yii::setAlias('@custom_modules', dirname (dirname( __DIR__ )) . '/user_modules');

return [
    'setup'         => app\modules\setup\Module::class,
    'customize'     => app\modules\customize\Module::class,
    'integration'   => app\modules\integration\Module::class,
    'website'       => app\modules\website\Module::class,
];
