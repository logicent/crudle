<?php

use crudle\setup\enums\Type_Role;
use website\enums\Type_Menu_Group;

$this->params['menuGroupClass'] = Type_Menu_Group::class;

return [
    [
        'route' => '/website/settings/index',
        'label' => 'Website Settings',
        'group' => Type_Menu_Group::Setup,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/theme/index',
        'label' => 'Website Theme',
        'group' => Type_Menu_Group::Setup,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/script/index',
        'label' => 'Website Script',
        'group' => Type_Menu_Group::Setup,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/about-page/index',
        'label' => 'About Page',
        'group' => Type_Menu_Group::Content,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/contact-page/index',
        'label' => 'Contact Page',
        'group' => Type_Menu_Group::Content,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/blog-article/index',
        'label' => 'Blog Article',
        'group' => Type_Menu_Group::Blog,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/blog-category/index',
        'label' => 'Blog Category',
        'group' => Type_Menu_Group::Blog,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/blog-writer/index',
        'label' => 'Blog Writer',
        'group' => Type_Menu_Group::Blog,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/web-page/index',
        'label' => 'Web Page',
        'group' => Type_Menu_Group::Content,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/web-form/index',
        'label' => 'Web Form',
        'group' => Type_Menu_Group::Content,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/sidebar/index',
        'label' => 'Sidebar Menu',
        'group' => Type_Menu_Group::Content,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/slideshow/index',
        'label' => 'Slide Show',
        'group' => Type_Menu_Group::Content,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/website/route-meta/index',
        'label' => 'Route Meta Tag',
        'group' => Type_Menu_Group::Setup,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
];
?>
