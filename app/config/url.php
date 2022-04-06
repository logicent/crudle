<?php

use yii\web\GroupUrlRule;

return [
    'enablePrettyUrl' => true,
    // 'enableStrictParsing' => true,
    'showScriptName' => false,
    'rules' => [
        // '' or '/' routes
        '/' => 'website/site/home/index',
        '/home' => 'website/site/home/index',
        '/about' => 'website/site/about/index',
        '/contact' => 'website/site/contact/index',
        '/blog' => 'website/site/blog-article/index',
        '/writer' => 'website/site/blog-writer/index',
        '/category' => 'website/site/blog-category/index',

        'app/site' => 'main/site/index',
        'app/login' => 'main/site/login',
        'app/logout' => 'main/site/logout',
        'app/forgot-password' => 'main/site/request-password-reset',
        'app/reset-password' => 'main/site/reset-password',

        'app' => '/main/dashboard/index', // redirect to dashboard
        'app/dashboard' => '/main/dashboard/index',
        'app/report' => '/main/report/index',
        
        // 'app/main' => '/main', // disallow
        'app/setup' => '/setup',
        'app/website' => '/website',

        // new GroupUrlRule([
        //     'prefix' => 'app',
        //     'rules' => [
        //         'main' => 'main',
        //         'setup' => 'setup',
        //         'website' => 'website',
        //     ],
        // ]),

        // Match menu titles and button labels in URL stubs
        // 'app/<module>/<controller>/New' => '<module>/<controller>/create',
        // 'app/<module>/<controller>/<id:\w+>' => '<module>/<controller>/read',
        // 'app/<module>/<controller>/<id:\w+>' => '<module>/<controller>/update',

        'app/setup/user/my-account' => 'setup/user/update',
        'app/setup/user/my-preferences' => 'setup/user/edit-preferences',

        // route standard and custom reports
        // 'query-report/<\w+>' => 'report/query/<\w+>',

        // generic rule goes last
        'app/<module>/<controller>' => '<module>/<controller>/index',
    ],
];
