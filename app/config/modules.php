<?php

use crudle\app\helpers\App;
use yii\helpers\ArrayHelper;

$coreModules = [
    // core modules
    'main'  => crudle\app\main\Module::class,
    'setup' => crudle\app\setup\Module::class,
    // code module
    // 'kit' => crudle\kit\Module::class,
];

// user modules
$userModules = App::getExtModules();

return ArrayHelper::merge($coreModules, $userModules);
