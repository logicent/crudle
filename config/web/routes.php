<?php

// use yii\web\GroupUrlRule;

// new GroupUrlRule([
//     'prefix' => 'app',
//     'rules' => [
//         'main' => 'main',
//         'setup' => 'setup',
//         'website' => 'website',
//     ],
// ]),
return [
    // ** app routes
    'app' => 'main/app/index', // defaultRoute requires this rule
    'app/login' => 'auth/login/login',
    'app/logout' => 'auth/logout',
    'app/forgot-password' => 'auth/request-password-reset',
    'app/reset-password' => 'auth/reset-password',

    'app/home' => '/main/home/index',
    'app/dashboards' => 'dashboard/dashboards/index',
    'app/reports' => 'report/reports/index',

    // ** app modules, std modules
    'app/<module>' => '/<module>',

    // ** Crud action routes
    'app/<module>/<controller>/New' => '<module>/<controller>/create',
    // 'app/<module>/<controller>/<id:\w+>' => '<module>/<controller>/read',
    // 'app/<module>/<controller>/<id:\w+>' => '<module>/<controller>/update',

    'app/setup/user/my-account' => 'setup/user/update',
    'app/setup/user/my-preferences' => 'setup/user/edit-preferences',

    // Standard/custom reports routes
    // 'query-report/<\w+>' => 'report/query/<\w+>',

    // Generic view-specific (generic) routes
    'app/<module>/<controller>' => '<module>/<controller>/index',
    // ***end app
];
