<?php

use crudle\app\helpers\App;
use crudle\app\main\enums\Type_Menu_Sub_Group;
use crudle\app\setup\enums\Type_Role;
use crudle\app\setup\models\Dashboard;
use crudle\app\setup\models\DeveloperSettingsForm;
use crudle\app\setup\models\ReportBuilder;
use crudle\app\setup\models\Setup;

$this->params['menuGroupClass'] = Type_Menu_Sub_Group::class;
$deployedSettings = Setup::getSettings( DeveloperSettingsForm::class );

$dashboards = $reports = $modules = $workspaces = [];
$dashboards = Dashboard::find()->where(['inactive' => false])->all();
$reports = ReportBuilder::find()->where(['inactive' => false])->all();
$modules = App::getModuleList();
// $workspaces = Workspace::find()->where(['inactive' => false])->all();
$dashboardMenus = $reportMenus = $moduleMenus = $workspaceMenus = [];

$workspaceMenus[] = [
    'route' => '/main/home/index',
    'label' => 'Home',
    'group' => Type_Menu_Sub_Group::Workspace,
    'visible' => Yii::$app->user->can(Type_Role::SystemManager),
];

foreach ($dashboards as $dashboard) :
    $dashboardMenus[] = [
        'route' => "/main/dashboard/index?id={$dashboard->route}",
        'label' => $dashboard->id,
        'group' => Type_Menu_Sub_Group::Dashboard,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ];
endforeach;

foreach ($reports as $report) :
    $reportMenus[] = [
        'route' =>  "/main/report/index?id={$report->route}",
        'label' => $report->id,
        'group' => Type_Menu_Sub_Group::Reports,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ];
endforeach;

foreach ($modules as $id => $module) :
    $moduleMenus[] = [
        'route' =>  "/{$id}",
        'label' => $module,
        'group' => Type_Menu_Sub_Group::Module,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ];
endforeach;

$menus = array_merge($dashboardMenus, $reportMenus, $moduleMenus, $workspaceMenus);

return $menus;
