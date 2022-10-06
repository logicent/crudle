<?php

use crudle\app\helpers\App;
use crudle\app\main\enums\Type_Menu_Sub_Group;
use crudle\app\setup\enums\Type_Role;
use crudle\app\main\models\Dashboard;
use crudle\app\main\models\ReportBuilder;
use crudle\app\setup\models\DeveloperSettingsForm;
use crudle\app\setup\models\Setup;
use yii\helpers\Inflector;

$this->params['menuGroupClass'] = Type_Menu_Sub_Group::class;
$deployedSettings = Setup::getSettings( DeveloperSettingsForm::class );

$dashboards = $reports = $modules = $workspaces = [];
$dashboards = Dashboard::find()->where(['inactive' => false])->all();
$reports = ReportBuilder::find()->where(['inactive' => false])->all();
$modules = App::getModules();
// $workspaces = Workspace::find()->where(['inactive' => false])->all();
$dashboardMenus = $reportMenus = $moduleMenus = $workspaceMenus = [];

$workspaceMenus[] = [
    'route' => '/main/home/index',
    'label' => 'Home',
    'group' => Type_Menu_Sub_Group::Workspace,
    'visible' => Yii::$app->user->can(Type_Role::SystemManager),
];

$dashboardMenus[] = [
    'route' => '/main/dashboard/index',
    'label' => 'Dashboard',
    'group' => Type_Menu_Sub_Group::Dashboard,
    'visible' => Yii::$app->user->can(Type_Role::SystemManager),
];
$dashboardMenus[] = [
    'route' => '/main/data-widget/index',
    'label' => 'Data Widget',
    'group' => Type_Menu_Sub_Group::Dashboard,
    'visible' => Yii::$app->user->can(Type_Role::SystemManager),
];
foreach ($dashboards as $dashboard) :
    $dashboardMenus[] = [
        'route' => "/main/dashboards/index?id={$dashboard->route}",
        'label' => $dashboard->id,
        'group' => Type_Menu_Sub_Group::Dashboard,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ];
endforeach;

$reportMenus[] = [
    'route' => '/main/report-builder/index',
    'label' => 'Report Builder',
    'group' => Type_Menu_Sub_Group::Reports,
    'visible' => Yii::$app->user->can(Type_Role::SystemManager),
];
$reportMenus[] = [
    'route' => '/main/report-template/index',
    'label' => 'Report Template',
    'group' => Type_Menu_Sub_Group::Reports,
    'visible' => Yii::$app->user->can(Type_Role::SystemManager),
];
foreach ($reports as $report) :
    $reportMenus[] = [
        'route' =>  "/main/reports/index?id={$report->route}",
        'label' => $report->id,
        'group' => Type_Menu_Sub_Group::Reports,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ];
endforeach;

foreach ($modules::$modules as $id => $module) :
    $moduleName = Inflector::id2camel($module['id']);
    $moduleLabel = Inflector::camel2words($moduleName);
    $moduleMenus[] = [
        'route' =>  "/{$module['id']}",
        'label' => $moduleLabel,
        'group' => Type_Menu_Sub_Group::Module,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ];
endforeach;

$menus = array_merge($dashboardMenus, $reportMenus, $moduleMenus, $workspaceMenus);

return $menus;
