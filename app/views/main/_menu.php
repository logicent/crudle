<?php

use app\enums\Type_Permission;
use app\enums\Type_Model;
use app\enums\Type_Module;
use app\enums\Type_Role;


return [
    [
        'route' => 'report/index',
        'label' => 'Reports',
        'icon' => 'line chart',
        'iconPath' => null,
        'iconColor' => 'blue',
        'group' => Type_Module::System,
        'visible' => true,
    ],
    [
        'route' => '/setup',
        'label' => Type_Model::Setup,
        'icon' => 'cog',
        'iconPath' => null,
        'iconColor' => 'brown',
        'group' => Type_Module::System,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
];
?>
