<?php

use yii\helpers\Json;

return [
    'class' => 'icms\FomanticUI\widgets\CheckboxColumn',
    // 'headerOptions' => [
    //     'id' => 'select_all_rows'
    // ],
    'checkboxOptions' => function ($model, $key, $index, $column) {
        return [
            'class' => 'select-row',
            'id' => $index,
            'value' => Json::encode($key),
        ];
    },
    // 'contentOptions' => [],
    // 'visible' => false
];
// [
//     'class' => 'yii\grid\SerialColumn',
//     'visible' => false
// ];