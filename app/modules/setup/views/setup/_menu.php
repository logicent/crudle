<?php

use app\modules\setup\enums\Type_Role;
use app\modules\setup\enums\Type_Menu_Group;
use app\modules\setup\models\DeveloperSettingsForm;
use app\modules\setup\models\Setup;

$deployedSettings = Setup::getSettings( DeveloperSettingsForm::class );

return [
    [
        'route' => '/setup/printer-settings',
        'label' => 'Printer Settings',
        'group' => Type_Menu_Group::Printing,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/print-settings',
        'label' => 'Print Settings',
        'group' => Type_Menu_Group::Printing,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/global-settings',
        'label' => 'General Settings',
        'group' => Type_Menu_Group::Core,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/layout-settings',
        'label' => 'Layout Settings',
        'group' => Type_Menu_Group::Core,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/organization-profile',
        'label' => 'Organization Profile',
        'group' => Type_Menu_Group::Core,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/smtp-settings',
        'label' => 'SMTP Settings',
        'group' => Type_Menu_Group::Email,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/report-builder',
        'label' => 'Report Builder',
        'icon' => '',
        'iconPath' => null,
        'iconColor' => '',
        'group' => Type_Menu_Group::Data,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/email-notification',
        'label' => 'Email Notification',
        'group' => Type_Menu_Group::Email,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/email-queue',
        'label' => 'Email Queue',
        'group' => Type_Menu_Group::Email,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/print-style',
        'label' => 'Print Style',
        'group' => Type_Menu_Group::Printing,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/print-format',
        'label' => 'Print Format',
        'group' => Type_Menu_Group::Printing,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/data-import',
        'label' => 'Data Import',
        'group' => Type_Menu_Group::Data,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/db-backup-settings',
        'label' => 'Database Backup',
        'group' => Type_Menu_Group::Data,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/user',
        'label' => 'User',
        'icon' => '',
        'iconPath' => null,
        'iconColor' => '',
        'group' => Type_Menu_Group::People,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    // [
    //     'route' => '/setup/role',
    //     'label' => 'Role',
    //     'iconPath' => null,
    //     'icon' => '',
    //     'iconColor' => '',
    //     'group' => Type_Menu_Group::People,
    //     'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    // ],
    [
        'route' => '/setup/role-permission',
        'label' => 'Role & Permission',
        'icon' => '',
        'iconPath' => null,
        'iconColor' => '',
        'group' => Type_Menu_Group::People,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/permission-manager',
        'label' => 'Permission Manager',
        'icon' => '',
        'iconPath' => null,
        'iconColor' => '',
        'group' => Type_Menu_Group::People,
        'visible' => false,
    ],
    [
        'route' => '/setup/user-log',
        'label' => 'User Log',
        'icon' => '',
        'iconPath' => null,
        'iconColor' => '',
        'group' => Type_Menu_Group::People,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/user-type',
        'label' => 'User Type',
        'icon' => '',
        'iconPath' => null,
        'iconColor' => '',
        'group' => Type_Menu_Group::People,
        'visible' => false,
    ],
];
?>