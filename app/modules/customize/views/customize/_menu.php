<?php

use app\enums\Type_Permission;
use app\enums\Type_Model;
use app\enums\Type_Module_Sub_Module;
use app\enums\Type_Module;
use app\enums\Type_Role;

return [
    [
        'route' => '/customize/report-builder',
        'label' => 'Report Builder',
        'icon' => '',
        'iconPath' => null,
        'iconColor' => '',
        'group' => Type_Module::Customize,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/customize/module-def',
        'label' => 'Module Def',
        'icon' => '',
        'iconPath' => null,
        'iconColor' => '',
        'group' => Type_Module::Customize,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/customize/doc-type',
        'label' => 'Doc Type',
        'icon' => '',
        'iconPath' => null,
        'iconColor' => '',
        'group' => Type_Module::Customize,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
];
?>