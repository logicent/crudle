<?php

use app\modules\setup\enums\Type_Role;
use app\modules\setup\enums\Type_Menu_Group;
use app\modules\setup\models\DeveloperSettingsForm;
use app\modules\setup\models\Setup;

$this->params['menuGroupClass'] = Type_Menu_Group::class;
$deployedSettings = Setup::getSettings( DeveloperSettingsForm::class );

return [
    [
        'route' => '/main/home/index',
        'label' => 'Home',
        'group' => Type_Menu_Group::Layout,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/main/dashboard/index',
        'label' => 'Dashboard',
        'group' => Type_Menu_Group::Layout,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
    [
        'route' => '/main/report/index',
        'label' => 'Report',
        'group' => Type_Menu_Group::Layout,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ],
];
?>