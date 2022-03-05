<?php

use app\enums\Type_Permission;
use app\enums\Type_Model;
use app\enums\Type_Module_Sub_Module;
use app\enums\Type_Module;
use app\enums\Type_Role;

return [
    [
        'route' => '/customize/doc-type',
        'label' => 'Doc Type',
        'icon' => 'file',
        'iconPath' => null,
        'iconColor' => 'yellow',
        'group' => Type_Module::Customize,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
];
?>