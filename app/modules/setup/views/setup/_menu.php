<?php

use app\modules\setup\enums\Type_Role;
use app\modules\setup\enums\Type_Menu_Group;
use app\modules\setup\models\DeveloperSettingsForm;
use app\modules\setup\models\Setup;

$this->params['menuGroupClass'] = Type_Menu_Group::class;
$deployedSettings = Setup::getSettings( DeveloperSettingsForm::class );

// 'icon' => '',
// 'iconPath' => null,
// 'iconColor' => '',

return [
    [
        'route' => '/setup/module-def',
        'label' => 'App Module',
        'group' => Type_Menu_Group::Core,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/doc-type',
        'label' => 'Data Model',
        'group' => Type_Menu_Group::Core,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/create-menu',
        'label' => 'Create Menu',
        'group' => Type_Menu_Group::Layout,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/help-menu',
        'label' => 'Help Menu',
        'group' => Type_Menu_Group::Layout,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/alert-menu',
        'label' => 'Alert Menu',
        'group' => Type_Menu_Group::Layout,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/menu-shortcut',
        'label' => 'Menu Shortcut',
        'group' => Type_Menu_Group::Layout,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/dashboard-widget',
        'label' => 'Dashboard Widget',
        'group' => Type_Menu_Group::Data,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
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
        'route' => '/setup/smtp-settings',
        'label' => 'SMTP Settings',
        'group' => Type_Menu_Group::Email,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/report-builder',
        'label' => 'Report Builder',
        'group' => Type_Menu_Group::Data,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/email-template',
        'label' => 'Email Template',
        'group' => Type_Menu_Group::Email,
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
        'group' => Type_Menu_Group::People,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/user-group',
        'label' => 'User Group',
        'group' => Type_Menu_Group::People,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/role-permission',
        'label' => 'Role & Permissions',
        'group' => Type_Menu_Group::People,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/permission-manager',
        'label' => 'Permission Manager',
        'group' => Type_Menu_Group::People,
        'visible' => false,
    ],
    [
        'route' => '/setup/user-log',
        'label' => 'User Log',
        'group' => Type_Menu_Group::People,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/user-type',
        'label' => 'User Type',
        'group' => Type_Menu_Group::People,
        'visible' => false,
    ],
];
?>