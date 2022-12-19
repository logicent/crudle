<?php

use crudle\app\user\enums\Type_Role;
use crudle\app\setting\enums\Type_Menu_Group;
use crudle\app\setting\forms\DeveloperSettingsForm;
use crudle\app\setting\models\Setup;

$this->params['menuGroupClass'] = Type_Menu_Group::class;
$deployedSettings = Setup::getSettings( DeveloperSettingsForm::class );

return [
    [
        'route' => '/database/data-model/index',
        'label' => 'Data Model',
        'group' => Type_Menu_Group::Tool,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/printing/printer-settings/index',
        'label' => 'Printer Settings',
        'group' => Type_Menu_Group::Printing,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/printing/print-settings/index',
        'label' => 'Print Settings',
        'group' => Type_Menu_Group::Printing,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setting/general-settings/index',
        'label' => 'General Settings',
        'group' => Type_Menu_Group::System,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setting/layout-settings/index',
        'label' => 'Layout Settings',
        'group' => Type_Menu_Group::System,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/email/smtp-settings/index',
        'label' => 'SMTP Settings',
        'group' => Type_Menu_Group::Email,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/email/template/index',
        'label' => 'Email Template',
        'group' => Type_Menu_Group::Email,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/email/notification/index',
        'label' => 'Email Notification',
        'group' => Type_Menu_Group::Email,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/email/queue/index',
        'label' => 'Email Queue',
        'group' => Type_Menu_Group::Email,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/printing/print-style/index',
        'label' => 'Print Style',
        'group' => Type_Menu_Group::Printing,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/printing/print-format/index',
        'label' => 'Print Format',
        'group' => Type_Menu_Group::Printing,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/database/data-import/index',
        'label' => 'Data Import',
        'group' => Type_Menu_Group::Tool,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/database/system-cache/index',
        'label' => 'System Cache',
        'group' => Type_Menu_Group::Storage,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/database/file-storage/index',
        'label' => 'File Storage',
        'group' => Type_Menu_Group::Storage,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/database/db-migration/index',
        'label' => 'Table Migration',
        'group' => Type_Menu_Group::Storage,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/database/db-backup-settings/index',
        'label' => 'Backup & Restore',
        'group' => Type_Menu_Group::Storage,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
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
    ],
    [
        'route' => '/setting/developer-settings/index',
        'label' => 'Developer Settings',
        'group' => Type_Menu_Group::System,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
];