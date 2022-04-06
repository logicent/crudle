<?php

use app\enums\Type_Module;
use app\modules\setup\enums\Type_Role;


return [
    [
        'route' => 'report/index',
        'label' => 'Report',
        'icon' => 'line chart',
        'iconPath' => null,
        'iconColor' => 'blue',
        'group' => Type_Module::Main,
        'visible' => true,
    ],
    [
        'route' => '/setup',
        'label' => 'Setup',
        'icon' => 'cog',
        'iconPath' => null,
        'iconColor' => 'brown',
        'group' => Type_Module::Main,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
];
?>
