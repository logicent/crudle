<?php

use crudle\app\main\enums\Module_Alias;
use crudle\app\main\helpers\App;
use yii\db\Connection;
use yii\helpers\ArrayHelper;

// core modules
$coreModules = [
    'auth'      => crudle\app\auth\Module::class,
    'crud'      => crudle\app\crud\Module::class,
    'database'  => crudle\app\database\Module::class,
    'email'     => crudle\app\email\Module::class,
    'list_view' => crudle\app\list_view\Module::class,
    'main'      => crudle\app\main\Module::class,
    'printing'  => crudle\app\printing\Module::class,
    'setup'     => crudle\app\setup\Module::class,
    'upload'    => crudle\app\upload\Module::class,
    'user'      => crudle\app\user\Module::class,
    'workflow'  => crudle\app\workflow\Module::class,
    'workspace' => crudle\app\workspace\Module::class,
];
// user modules
$userModules = App::getModules();
$userModules = ArrayHelper::map($userModules::$modules, 'id', 'class');

return ArrayHelper::merge($coreModules, $userModules);

// set modules tablePrefix
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
