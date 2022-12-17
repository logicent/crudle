<?php

use crudle\app\main\helpers\App;

return [
    [
        'attribute' => 'module',
        'value' => function ($model) {
            return !empty($model->module) ? App::getModuleList()[$model->module] : null;
        }
    ],
    'is_table:boolean'
];
