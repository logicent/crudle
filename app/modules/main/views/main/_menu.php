<?php

use crudle\app\main\enums\Type_Menu_Sub_Group;
use crudle\app\setup\enums\Type_Role;
use crudle\app\setup\models\Dashboard;
use crudle\app\setup\models\DeveloperSettingsForm;
use crudle\app\setup\models\ReportBuilder;
use crudle\app\setup\models\Setup;

$this->params['menuGroupClass'] = Type_Menu_Sub_Group::class;
$deployedSettings = Setup::getSettings( DeveloperSettingsForm::class );

$dashboards = $reports = $workspaces = [];
$dashboards = Dashboard::find()->where(['inactive' => false])->all();
$reports = ReportBuilder::find()->where(['inactive' => false])->all();
// $workspaces = Workspace::find()->where(['inactive' => false])->all();
$dashboardMenus = $reportMenus = $workspaceMenus = [];

$workspaceMenus[] = [
    'route' => '/main/home/index',
    'label' => 'Home',
    'group' => Type_Menu_Sub_Group::Workspace,
    'visible' => Yii::$app->user->can(Type_Role::SystemManager),
];

foreach ($dashboards as $dashboard) :
    $dashboardMenus[] = [
        'route' => "/main{$dashboard->route}/index",
        'label' => $dashboard->id,
        'group' => Type_Menu_Sub_Group::Dashboard,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ];
endforeach;

foreach ($reports as $report) :
    $reportMenus[] = [
        'route' =>  "/main{$report->route}/index",
        'label' => $report->id,
        'group' => Type_Menu_Sub_Group::Reports,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ];
endforeach;

$menus = array_merge($dashboardMenus, $reportMenus, $workspaceMenus);

return $menus;