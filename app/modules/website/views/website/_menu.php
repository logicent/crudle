<?php

use app\enums\Type_Module;
use app\enums\Type_Role;


return [
    [
        'route' => '/website/site-navigation',
        'label' => 'Site Navigation',
        'group' => Type_Module::Website,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/site-page',
        'label' => 'Site Page',
        'group' => Type_Module::Website,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/site-post',
        'label' => 'Site Post',
        'group' => Type_Module::Website,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/site-footer',
        'label' => 'Footer Navigation',
        'group' => Type_Module::Website,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/slider',
        'label' => 'Slider',
        'group' => Type_Module::Website,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/testimonial',
        'label' => 'Testimonial',
        'group' => Type_Module::Website,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/featured-app',
        'label' => 'Featured App',
        'icon' => '',
        'iconPath' => null,
        'iconColor' => '',
        'group' => Type_Module::Website,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
];
?>