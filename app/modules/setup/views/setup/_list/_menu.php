<?php

use app\enums\Type_Module_Sub_Module;
use app\enums\Type_Module;
use app\enums\Type_Role;
use app\modules\setup\models\DeveloperSettingsForm;
use app\modules\setup\models\Setup;

$deployedSettings = Setup::getSettings( DeveloperSettingsForm::class );

return [
    [
        'route' => 'setup/print-style/index',
        'label' => 'Print Style',
        'group' => Type_Module::System,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => 'setup/print-format/index',
        'label' => 'Print Format',
        'group' => Type_Module::System,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => 'setup/printer-settings/index',
        'label' => 'Printer Settings',
        'group' => Type_Module::System,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => 'setup/print-settings/index',
        'label' => 'Print Settings',
        'group' => Type_Module::System,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => 'setup/global-settings/index',
        'label' => 'General Settings',
        'group' => Type_Module::System,
        'visible' => Yii::$app->user->can(Type_Role::Administrator),
    ],
    [
        'route' => 'setup/business-profile/index',
        'label' => 'Business Profile',
        'group' => Type_Module::System,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => 'setup/report-builder/index',
        'label' => 'Report Builder',
        'group' => Type_Module_Sub_Module::Tool,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => 'setup/role-permission/index',
        'label' => 'Role & Permission',
        'group' => Type_Module::System,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => 'setup/smtp-settings/index',
        'label' => 'SMTP Settings',
        'group' => Type_Module_Sub_Module::Tool,
        'visible' => Yii::$app->user->can(Type_Role::Administrator),
    ],
    [
        'route' => 'setup/data-import-tool/index',
        'label' => 'Data Import',
        'group' => Type_Module_Sub_Module::Tool,
        'visible' => Yii::$app->user->can(Type_Role::Administrator),
    ],
    [
        'route' => 'setup/db-backup-settings/index',
        'label' => 'Database Backup',
        'group' => Type_Module_Sub_Module::Tool,
        'visible' => Yii::$app->user->can(Type_Role::Administrator),
    ],
    [
        'route' => 'setup/email-notification/index',
        'label' => 'Email Notification',
        'group' => Type_Module::System,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => 'setup/email-queue/index',
        'label' => 'Email Queue',
        'group' => Type_Module::System,
        'visible' => Yii::$app->user->can(Type_Role::Administrator),
    ]
];
?>