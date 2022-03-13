<?php

use app\modules\setup\enums\Type_Role;
use app\modules\website\enums\Type_Menu_Group;

$this->params['menuGroupClass'] = Type_Menu_Group::class;

return [
    [
        'route' => '/website/settings',
        'label' => 'Website Settings',
        'group' => Type_Menu_Group::Setup,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/theme',
        'label' => 'Website Theme',
        'group' => Type_Menu_Group::Setup,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/script',
        'label' => 'Website Script',
        'group' => Type_Menu_Group::Setup,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/about-page',
        'label' => 'About Page',
        'group' => Type_Menu_Group::Content,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/contact-page',
        'label' => 'Contact Page',
        'group' => Type_Menu_Group::Content,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/blog-article',
        'label' => 'Blog Article',
        'group' => Type_Menu_Group::Blog,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/blog-category',
        'label' => 'Blog Category',
        'group' => Type_Menu_Group::Blog,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/blog-writer',
        'label' => 'Blog Writer',
        'group' => Type_Menu_Group::Blog,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/web-page',
        'label' => 'Web Page',
        'group' => Type_Menu_Group::Content,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/web-form',
        'label' => 'Web Form',
        'group' => Type_Menu_Group::Content,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/sidebar',
        'label' => 'Sidebar Menu',
        'group' => Type_Menu_Group::Content,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/slideshow',
        'label' => 'Slide Show',
        'group' => Type_Menu_Group::Content,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/route-meta',
        'label' => 'Route Meta Tag',
        'group' => Type_Menu_Group::Setup,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
];
?>