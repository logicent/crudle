<?php

use app\enums\Type_Permission;
use app\enums\Type_Model;
use app\enums\Type_Module_Sub_Module;
use app\enums\Type_Module;
use app\enums\Type_Role;

return [
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
    [
        'route' => '/customize/create-menu',
        'label' => 'Create Menu',
        'icon' => '',
        'iconPath' => null,
        'iconColor' => '',
        'group' => Type_Module::Customize,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/customize/help-menu',
        'label' => 'Help Menu',
        'icon' => '',
        'iconPath' => null,
        'iconColor' => '',
        'group' => Type_Module::Customize,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/customize/alert-menu',
        'label' => 'Alert Menu',
        'icon' => '',
        'iconPath' => null,
        'iconColor' => '',
        'group' => Type_Module::Customize,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/customize/menu-shortcut',
        'label' => 'Menu Shortcut',
        'icon' => '',
        'iconPath' => null,
        'iconColor' => '',
        'group' => Type_Module::Customize,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/customize/dashboard-widget',
        'label' => 'Dashboard Widget',
        'icon' => '',
        'iconPath' => null,
        'iconColor' => '',
        'group' => Type_Module::Customize,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
];
?>