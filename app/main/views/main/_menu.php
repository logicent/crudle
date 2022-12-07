<?php

use crudle\app\main\helpers\App;
use crudle\app\crud\enums\Type_Menu_Group;
// use crudle\app\main\enums\Type_Menu_Group;
use crudle\app\user\enums\Type_Role;
use crudle\ext\dashboard\models\Dashboard;
use crudle\ext\report\models\ReportBuilder;
use crudle\app\setup\forms\DeveloperSettingsForm;
use crudle\app\setup\models\Setup;
use yii\helpers\Inflector;

$this->params['menuGroupClass'] = Type_Menu_Group::class;
$deployedSettings = Setup::getSettings( DeveloperSettingsForm::class );

$dashboards = $reports = $modules = $workspaces = [];
$dashboards = Dashboard::find()->where(['inactive' => false])->all();
$reports = ReportBuilder::find()->where(['inactive' => false])->all();
$modules = App::getModules();
// $workspaces = Workspace::find()->where(['inactive' => false])->all();
$dashboardMenus = $reportMenus = $moduleMenus = $workspaceMenus = [];

$workspaceMenus[] = [
    'route' => '/workspace/home/index',
    'label' => 'Home',
    'group' => Type_Menu_Group::Workspace,
    'visible' => Yii::$app->user->can(Type_Role::SystemManager),
];

$dashboardMenus[] = [
    'route' => '/dashboard/dashboard/index',
    'label' => 'Dashboard',
    'group' => Type_Menu_Group::Dashboard,
    'visible' => Yii::$app->user->can(Type_Role::SystemManager),
];
$dashboardMenus[] = [
    'route' => '/dashboard/data-widget/index',
    'label' => 'Data Widget',
    'group' => Type_Menu_Group::Dashboard,
    'visible' => Yii::$app->user->can(Type_Role::SystemManager),
];
foreach ($dashboards as $dashboard) :
    $dashboardMenus[] = [
        'route' => "/dashboard/dashboards/index?id={$dashboard->route}",
        'label' => $dashboard->id,
        'group' => Type_Menu_Group::Dashboard,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ];
endforeach;

$reportMenus[] = [
    'route' => '/report/report-builder/index',
    'label' => 'Report Builder',
    'group' => Type_Menu_Group::Reports,
    'visible' => Yii::$app->user->can(Type_Role::SystemManager),
];
$reportMenus[] = [
    'route' => '/report/report-template/index',
    'label' => 'Report Template',
    'group' => Type_Menu_Group::Reports,
    'visible' => Yii::$app->user->can(Type_Role::SystemManager),
];
foreach ($reports as $report) :
    $reportMenus[] = [
        'route' =>  "/report/reports/index?id={$report->route}",
        'label' => $report->id,
        'group' => Type_Menu_Group::Reports,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ];
endforeach;

foreach ($modules::$modules as $id => $module) :
    $moduleName = Inflector::id2camel($module['id']);
    $moduleMenus[] = [
        'route' =>  "/{$module['id']}",
        'label' => $module['name'],
        'group' => Type_Menu_Group::Module,
        'visible' => Yii::$app->user->can(Type_Role::SystemManager),
    ];
endforeach;

$menus = array_merge($dashboardMenus, $reportMenus, $moduleMenus, $workspaceMenus);

return $menus;
