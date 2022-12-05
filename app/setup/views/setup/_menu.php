<?php

use crudle\app\setup\enums\Type_Role;
use crudle\app\setup\enums\Type_Menu_Group;
use crudle\app\setup\models\DeveloperSettingsForm;
use crudle\app\setup\models\Setup;

$this->params['menuGroupClass'] = Type_Menu_Group::class;
$deployedSettings = Setup::getSettings( DeveloperSettingsForm::class );

return [
    [
        'route' => '/setup/data-model/index',
        'label' => 'Data Model',
        'group' => Type_Menu_Group::Tool,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/printer-settings/index',
        'label' => 'Printer Settings',
        'group' => Type_Menu_Group::Printing,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/print-settings/index',
        'label' => 'Print Settings',
        'group' => Type_Menu_Group::Printing,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/general-settings/index',
        'label' => 'General Settings',
        'group' => Type_Menu_Group::System,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/layout-settings/index',
        'label' => 'Layout Settings',
        'group' => Type_Menu_Group::System,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/smtp-settings/index',
        'label' => 'SMTP Settings',
        'group' => Type_Menu_Group::Email,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/email-template/index',
        'label' => 'Email Template',
        'group' => Type_Menu_Group::Email,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/email-notification/index',
        'label' => 'Email Notification',
        'group' => Type_Menu_Group::Email,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/email-queue/index',
        'label' => 'Email Queue',
        'group' => Type_Menu_Group::Email,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/print-style/index',
        'label' => 'Print Style',
        'group' => Type_Menu_Group::Printing,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/print-format/index',
        'label' => 'Print Format',
        'group' => Type_Menu_Group::Printing,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/data-import/index',
        'label' => 'Data Import',
        'group' => Type_Menu_Group::Tool,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/system-cache/index',
        'label' => 'System Cache',
        'group' => Type_Menu_Group::Storage,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/file-storage/index',
        'label' => 'File Storage',
        'group' => Type_Menu_Group::Storage,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/db-migration/index',
        'label' => 'Table Migration',
        'group' => Type_Menu_Group::Storage,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/db-backup-settings/index',
        'label' => 'Backup & Restore',
        'group' => Type_Menu_Group::Storage,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/user/index',
        'label' => 'User & Preferences',
        'group' => Type_Menu_Group::People,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/user-group/index',
        'label' => 'User Group',
        'group' => Type_Menu_Group::People,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/role/index',
        'label' => 'Role & Permissions',
        'group' => Type_Menu_Group::People,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/user-log/index',
        'label' => 'User Log',
        'group' => Type_Menu_Group::People,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/developer-settings/index',
        'label' => 'Developer Settings',
        'group' => Type_Menu_Group::System,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
];
?>
