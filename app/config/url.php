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
    'enablePrettyUrl' => true,
    // 'enableStrictParsing' => true,
    'showScriptName' => false,
    'rules' => [
        // ** website routes
        // '' or '/' routes
        '/' => 'website/site/home/index',
        '/home' => 'website/site/home/index',
        '/about' => 'website/site/about/index',
        '/contact' => 'website/site/contact/index',
        '/blog' => 'website/site/blog-article/index',
        '/writer' => 'website/site/blog-writer/index',
        '/category' => 'website/site/blog-category/index',
        // ** end website
        // ** app routes
        'app' => 'main/app/index', // defaultRoute requires this rule
        'app/login' => 'main/app/login',
        'app/logout' => 'main/app/logout',
        'app/forgot-password' => 'main/app/request-password-reset',
        'app/reset-password' => 'main/app/reset-password',

        'app/home' => '/main/home/index',
        'app/dashboard' => '/main/dashboard/index',
        'app/report' => '/main/report/index',

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
    ],
];
