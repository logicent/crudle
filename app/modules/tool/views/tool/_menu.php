<?php

use app\enums\Type_Module;
use app\enums\Type_Role;


return [
    [
        'route' => '/tool/report-builder',
        'label' => 'Report Builder',
        'icon' => '',
        'iconPath' => null,
        'iconColor' => '',
        'group' => Type_Module::Tool,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/tool/email-notification',
        'label' => 'Email Notification',
        'group' => Type_Module::Tool,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/tool/email-queue',
        'label' => 'Email Queue',
        'group' => Type_Module::Tool,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/tool/print-style',
        'label' => 'Print Style',
        'group' => Type_Module::Tool,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/tool/print-format',
        'label' => 'Print Format',
        'group' => Type_Module::Tool,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/tool/data-import',
        'label' => 'Data Import',
        'group' => Type_Module::Tool,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/setup/db-backup-settings',
        'label' => 'Database Backup',
        'group' => Type_Module::Tool,
        'visible' => Yii::$app->user->can(Type_Role::Administrator),
    ],
];
?>