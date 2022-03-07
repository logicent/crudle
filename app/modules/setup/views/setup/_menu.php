<?php

use app\enums\Type_Module_Sub_Module;
use app\enums\Type_Module;
use app\enums\Type_Role;
use app\modules\setup\models\DeveloperSettingsForm;
use app\modules\setup\models\Setup;

$deployedSettings = Setup::getSettings( DeveloperSettingsForm::class );

return [
    [
        'route' => '/setup/print-style',
        'label' => 'Print Style',
        'group' => Type_Module::System,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/print-format',
        'label' => 'Print Format',
        'group' => Type_Module::System,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/printer-settings',
        'label' => 'Printer Settings',
        'group' => Type_Module::System,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/print-settings',
        'label' => 'Print Settings',
        'group' => Type_Module::System,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/global-settings',
        'label' => 'General Settings',
        'group' => Type_Module::System,
        'visible' => Yii::$app->user->can(Type_Role::Administrator),
    ],
    [
        'route' => '/setup/business-profile',
        'label' => 'Business Profile',
        'group' => Type_Module::System,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/role-permission',
        'label' => 'Role & Permission',
        'group' => Type_Module::System,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/smtp-settings',
        'label' => 'SMTP Settings',
        'group' => Type_Module_Sub_Module::Tool,
        'visible' => Yii::$app->user->can(Type_Role::Administrator),
    ],
    [
        'route' => '/setup/data-import-tool',
        'label' => 'Data Import',
        'group' => Type_Module_Sub_Module::Tool,
        'visible' => Yii::$app->user->can(Type_Role::Administrator),
    ],
    [
        'route' => '/setup/db-backup-settings',
        'label' => 'Database Backup',
        'group' => Type_Module_Sub_Module::Tool,
        'visible' => Yii::$app->user->can(Type_Role::Administrator),
    ],
    [
        'route' => '/setup/email-notification',
        'label' => 'Email Notification',
        'group' => Type_Module::System,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/email-queue',
        'label' => 'Email Queue',
        'group' => Type_Module::System,
        'visible' => Yii::$app->user->can(Type_Role::Administrator),
    ]
];
?>