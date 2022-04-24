<?php

use crudle\setup\enums\Type_Role;
use crudle\setup\enums\Type_Menu_Sub_Group;
use crudle\setup\models\DeveloperSettingsForm;
use crudle\setup\models\Setup;

$this->params['menuGroupClass'] = Type_Menu_Sub_Group::class;
$deployedSettings = Setup::getSettings( DeveloperSettingsForm::class );

return [
    [
        'route' => '/kit/kit/index',
        'label' => 'Data Model',
        'group' => Type_Menu_Sub_Group::Code,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/kit/crud/index',
        'label' => 'CRUD',
        'group' => Type_Menu_Sub_Group::Code,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/kit/controller/index',
        'label' => 'Controller',
        'group' => Type_Menu_Sub_Group::Code,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/kit/form/index',
        'label' => 'Form View',
        'group' => Type_Menu_Sub_Group::Code,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/kit/module/index',
        'label' => 'App Module',
        'group' => Type_Menu_Sub_Group::Code,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/kit/extension/index',
        'label' => 'Extension',
        'group' => Type_Menu_Sub_Group::Code,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
];
?>