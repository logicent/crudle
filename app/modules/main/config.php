<?php

// use yii\web\GroupUrlRule;

// new GroupUrlRule([
//     'prefix' => 'app',
//     'rules' => [
//         'main' => '/main',
//     ],
// ]);

return [
    'defaultRoute' => 'main',
    'components' => [
        'urlManager' => [
            'class' => '\yii\web\UrlManager',
            'rules' => [
                '/' => 'web-cms/site/home/index',
                '/home' => 'web-cms/site/home/index',
                '/about' => 'web-cms/site/about/index',
                '/contact' => 'web-cms/site/contact/index',
                '/blog/category/<id:\w+>' => 'web-cms/site/blog-category/read',
                '/blog/category' => 'web-cms/site/blog-category/index',
                '/blog/writer/<id:\w+>' => 'web-cms/site/blog-writer/read',
                '/blog/writer' => 'web-cms/site/blog-writer/index',
                '/blog/<id:\w+>' => 'web-cms/site/blog-article/read',
                '/blog' => 'web-cms/site/blog-article/index',
            ]
        ]
    ]
];