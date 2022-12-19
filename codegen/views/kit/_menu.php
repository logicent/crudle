<?php

use crudle\app\user\enums\Type_Role;
use crudle\app\setting\enums\Type_Menu_Sub_Group;
use crudle\app\setting\forms\DeveloperSettingsForm;
use crudle\app\setting\models\Setup;

$this->params['menuGroupClass'] = Type_Menu_Sub_Group::class;
$deployedSettings = Setup::getSettings( DeveloperSettingsForm::class );

return [
    [
        'route' => '/kit/kit/index',
        'label' => 'Crudle Kit',
        'group' => Type_Menu_Sub_Group::Code,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/kit/model',
        'label' => 'Data Model',
        'group' => Type_Menu_Sub_Group::Code,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/kit/crud',
        'label' => 'CRUD',
        'group' => Type_Menu_Sub_Group::Code,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/kit/controller',
        'label' => 'Controller',
        'group' => Type_Menu_Sub_Group::Code,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/kit/form',
        'label' => 'Form View',
        'group' => Type_Menu_Sub_Group::Code,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/kit/module',
        'label' => 'App Module',
        'group' => Type_Menu_Sub_Group::Code,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/kit/extension',
        'label' => 'Extension',
        'group' => Type_Menu_Sub_Group::Code,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
];
?>