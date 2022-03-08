<?php

use app\enums\Type_Module;
use app\enums\Type_Role;
use app\modules\setup\models\DeveloperSettingsForm;
use app\modules\setup\models\Setup;

$deployedSettings = Setup::getSettings( DeveloperSettingsForm::class );

return [
    [
        'route' => '/setup/printer-settings',
        'label' => 'Printer Settings',
        'group' => Type_Module::Setup,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/print-settings',
        'label' => 'Print Settings',
        'group' => Type_Module::Setup,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/global-settings',
        'label' => 'General Settings',
        'group' => Type_Module::Setup,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/layout-settings',
        'label' => 'Layout Settings',
        'group' => Type_Module::Setup,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/business-profile',
        'label' => 'Business Profile',
        'group' => Type_Module::Setup,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/smtp-settings',
        'label' => 'SMTP Settings',
        'group' => Type_Module::Tool,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
];
?>