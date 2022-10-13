<?php

use crudle\app\setup\enums\Type_Role;
use crudle\app\setup\enums\Type_User;

return [
        [
                'icon' => 'grey table large',
                'route' => 'dashboards',
                'label' => 'Dashboards',
                'inactive' => true,
        ],
        [
                'icon' => 'grey bar chart large',
                'route' => 'reports',
                'label' => 'Reports',
                'inactive' => true,
        ],
        [
                'icon' => 'grey clone outline large',
                'route' => 'main',
                'label' => 'Main',
                'inactive' => true,
        ],
        [
                'icon' => 'grey toggle on large',
                'route' => 'setup',
                'label' => 'Setup',
                'inactive' => Yii::$app->user->can(Type_Role::SystemManager),
        ],
        [
                'icon' => 'grey sitemap large',
                'route' => 'web-cms',
                'label' => 'Web CMS',
                'inactive' => true,
        ],
        [
                'icon' => 'grey laptop code large',
                'route' => 'kit',
                'label' => 'Kit',
                'inactive' => Yii::$app->user->can(Type_Role::Administrator),
        ]
];