<?php

use crudle\app\helpers\App;

return [
    [
        'value' => function ($model) {
            return !empty($model->module) ? App::getModuleList()[$model->module] : null;
        }
    ],
    'is_table:boolean'
];
