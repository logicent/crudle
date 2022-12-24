<?php

use crudle\app\main\enums\Module_Alias;
use crudle\app\main\helpers\App;
use yii\db\Connection;
use yii\helpers\ArrayHelper;

// core modules
$coreModules = [
    'auth'      =>  crudle\app\auth\Module::class,
    'crud'      =>  crudle\app\crud\Module::class,
    'database'  =>  crudle\app\database\Module::class,
    'dashboard' =>  crudle\app\dashboard\Module::class,
    'email'     =>  crudle\app\email\Module::class,
    'listing'   =>  crudle\app\listing\Module::class,
    'main'      =>  crudle\app\main\Module::class,
    'printing'  =>  crudle\app\printing\Module::class,
    'report' =>  crudle\app\report\Module::class,
    'setting'   =>  crudle\app\setting\Module::class,
    'user'      =>  crudle\app\user\Module::class,
    'workflow'  =>  crudle\app\workflow\Module::class,
    'workspace' =>  crudle\app\workspace\Module::class,
];
// ext modules
$extModules = App::getModules();
$extModules = ArrayHelper::map($extModules::$modules, 'id', 'class');

return ArrayHelper::merge($coreModules, $extModules);

// set modules tablePrefix
// $modules = [];
// foreach ($extModules::$modules as $userModule)
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
