<?php

use app\enums\Type_Permission;
use app\enums\Type_Model;
use app\enums\Type_Module;
use app\enums\Type_Role;


return [
    [
        'route' => '/user',
        'label' => 'User',
        'icon' => '',
        'iconPath' => null,
        'iconColor' => '',
        'group' => Type_Module::Main,
        'visible' => true,
    ],
    [
        'route' => '/role',
        'label' => 'Role',
        'icon' => '',
        'iconPath' => null,
        'iconColor' => '',
        'group' => Type_Module::Main,
        'visible' => true,
    ],
    [
        'route' => '/role-permission',
        'label' => 'Role & Permission',
        'icon' => '',
        'iconPath' => null,
        'iconColor' => '',
        'group' => Type_Module::Main,
        'visible' => true,
    ],
    [
        'route' => '/permission-manager',
        'label' => 'Permission Manager',
        'icon' => '',
        'iconPath' => null,
        'iconColor' => '',
        'group' => Type_Module::Main,
        'visible' => true,
    ],
    [
        'route' => '/user-log',
        'label' => 'User Log',
        'icon' => '',
        'iconPath' => null,
        'iconColor' => '',
        'group' => Type_Module::Main,
        'visible' => true,
    ],
    [
        'route' => '/user-type',
        'label' => 'User Type',
        'icon' => '',
        'iconPath' => null,
        'iconColor' => '',
        'group' => Type_Module::Main,
        'visible' => true,
    ],
];
?>
