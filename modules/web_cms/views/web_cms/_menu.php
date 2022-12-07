<?php

use crudle\app\user\enums\Type_Role;
use crudle\ext\web_cms\enums\Type_Menu_Sub_Group;

$this->params['menuGroupClass'] = Type_Menu_Sub_Group::class;

return [
    [
        'route' => '/web-cms/settings/index',
        'label' => 'Website Settings',
        'group' => Type_Menu_Sub_Group::Setup,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/web-cms/theme/index',
        'label' => 'Website Theme',
        'group' => Type_Menu_Sub_Group::Setup,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/web-cms/script/index',
        'label' => 'Website Script',
        'group' => Type_Menu_Sub_Group::Setup,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/web-cms/about-page/index',
        'label' => 'About Page',
        'group' => Type_Menu_Sub_Group::Content,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/web-cms/contact-page/index',
        'label' => 'Contact Page',
        'group' => Type_Menu_Sub_Group::Content,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/web-cms/blog-article/index',
        'label' => 'Blog Article',
        'group' => Type_Menu_Sub_Group::Blog,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/web-cms/blog-category/index',
        'label' => 'Blog Category',
        'group' => Type_Menu_Sub_Group::Blog,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/web-cms/blog-writer/index',
        'label' => 'Blog Writer',
        'group' => Type_Menu_Sub_Group::Blog,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/web-cms/web-page/index',
        'label' => 'Web Page',
        'group' => Type_Menu_Sub_Group::Content,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/web-cms/web-form/index',
        'label' => 'Web Form',
        'group' => Type_Menu_Sub_Group::Content,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/web-cms/sidebar-menu/index',
        'label' => 'Sidebar Menu',
        'group' => Type_Menu_Sub_Group::Content,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/web-cms/slideshow/index',
        'label' => 'Slide Show',
        'group' => Type_Menu_Sub_Group::Content,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/web-cms/route-meta/index',
        'label' => 'Route Meta Tag',
        'group' => Type_Menu_Sub_Group::Setup,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
];
?>
