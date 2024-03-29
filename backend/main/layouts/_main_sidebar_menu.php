<?php

use crudle\app\user\enums\Type_Role;
use crudle\app\user\enums\Type_User;

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
                'icon' => 'grey window restore outline large',
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
                'icon' => 'grey laptop code large',
                'route' => 'kit',
                'label' => 'Kit',
                'inactive' => Yii::$app->user->can(Type_Role::Administrator),
        ]
];