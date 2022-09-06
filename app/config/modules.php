<?php

use crudle\app\helpers\App;
use yii\db\Connection;
use yii\helpers\ArrayHelper;

$coreModules = [
    // core modules
    'main'  => crudle\app\main\Module::class,
    'setup' => crudle\app\setup\Module::class,
    // code module
    // 'kit' => crudle\kit\Module::class,
];

// user modules
$userModules = App::getModules();
$userModules = ArrayHelper::map($userModules::$modules, 'id', 'class');
// set modules tablePrefix
return ArrayHelper::merge($coreModules, $userModules);

// $modules = [];
// foreach ($userModules::$modules as $userModule)
// {
//     $modules[$userModule['id']] = [
//         'class' => $userModule['class'],
//         'components' => [
//             'db' => [
//                 'class' => 'yii\db\Connection',
//                 'tablePrefix' => App::env('CRUDLE_DB_MODULE_TABLE_PREFIX'),
//             ]
//         ]
//     ];
// }

// return ArrayHelper::merge($coreModules, $modules);
