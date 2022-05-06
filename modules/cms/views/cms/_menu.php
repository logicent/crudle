<?php

use crudle\app\setup\enums\Type_Role;
use crudle\ext\cms\enums\Type_Menu_Sub_Group;

$this->params['menuGroupClass'] = Type_Menu_Sub_Group::class;

return [
    [
        'route' => '/cms/settings/index',
        'label' => 'Website Settings',
        'group' => Type_Menu_Sub_Group::Setup,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/cms/theme/index',
        'label' => 'Website Theme',
        'group' => Type_Menu_Sub_Group::Setup,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/cms/script/index',
        'label' => 'Website Script',
        'group' => Type_Menu_Sub_Group::Setup,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/cms/about-page/index',
        'label' => 'About Page',
        'group' => Type_Menu_Sub_Group::Content,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/cms/contact-page/index',
        'label' => 'Contact Page',
        'group' => Type_Menu_Sub_Group::Content,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/cms/blog-article/index',
        'label' => 'Blog Article',
        'group' => Type_Menu_Sub_Group::Blog,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/cms/blog-category/index',
        'label' => 'Blog Category',
        'group' => Type_Menu_Sub_Group::Blog,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/cms/blog-writer/index',
        'label' => 'Blog Writer',
        'group' => Type_Menu_Sub_Group::Blog,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/cms/web-page/index',
        'label' => 'Web Page',
        'group' => Type_Menu_Sub_Group::Content,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/cms/web-form/index',
        'label' => 'Web Form',
        'group' => Type_Menu_Sub_Group::Content,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/cms/sidebar/index',
        'label' => 'Sidebar Menu',
        'group' => Type_Menu_Sub_Group::Content,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/cms/slideshow/index',
        'label' => 'Slide Show',
        'group' => Type_Menu_Sub_Group::Content,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/cms/route-meta/index',
        'label' => 'Route Meta Tag',
        'group' => Type_Menu_Sub_Group::Setup,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
];
?>
