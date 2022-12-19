<?php

use crudle\app\setting\enums\Type_Menu_Group;
use crudle\app\user\enums\Type_Role;

$this->params['menuGroupClass'] = Type_Menu_Group::class;

return [
    [
        'route' => '/user/account/index',
        'label' => 'User & Preferences',
        'group' => Type_Menu_Group::People,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/user/group/index',
        'label' => 'User Group',
        'group' => Type_Menu_Group::People,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/user/role/index',
        'label' => 'Role & Permissions',
        'group' => Type_Menu_Group::People,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/user/log/index',
        'label' => 'User Log',
        'group' => Type_Menu_Group::People,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ]
];