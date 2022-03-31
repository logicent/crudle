<?php

// use yii\web\GroupUrlRule;

// new GroupUrlRule([
//     'prefix' => 'app',
//     'rules' => [
//         'setup' => '/setup',
//         'website' => '/website',
//     ],
// ]);

return [
    'enablePrettyUrl' => true,
    // 'enableStrictParsing' => true,
    'showScriptName' => false,
    'rules' => [
        // '' => 'site/index',
        'app' => 'main/index',
        'login' => 'site/login',
        'logout' => 'site/logout',
        'forgot-password' => 'site/request-password-reset',
        'reset-password' => 'site/reset-password',

        // Match menu titles and button labels in URL stubs
        '<controller>/New' => '<controller>/create',
        '<controller>/<id:>/Read' => '<controller>/read',
        '<controller>/<id:\w+>/Edit' => '<controller>/update',

        'My Account/<id:\w+>' => 'people/update',

        // Prettify document URL here with params etc
        // 'Report/<controller>' => '<controller>/report-builder',

        // route standard and custom reports
        // 'query-report/<\w+>' => 'report/query/<\w+>',

        // generic rule goes last
        '<controller>/List' => '<controller>/index',

        // 'Setup' => 'setup',
        // 'Setup/<controller>' => 'setup/<controller>/index',
    ],
];
