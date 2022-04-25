<?php

use crudle\main\enums\Type_Menu_Group;
use crudle\setup\enums\Type_Role;
use crudle\setup\models\DeveloperSettingsForm;
use crudle\setup\models\Setup;

$this->params['menuGroupClass'] = Type_Menu_Group::class;
$deployedSettings = Setup::getSettings( DeveloperSettingsForm::class );

return [
    [
        'route' => '/main/home/index',
        'label' => 'Home',
        'group' => Type_Menu_Group::Reports,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/main/dashboard/index',
        'label' => 'Dashboard',
        'group' => Type_Menu_Group::Reports,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/main/report/index',
        'label' => 'Report',
        'group' => Type_Menu_Group::Reports,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
];
?>