<?php

use icms\FomanticUI\modules\Checkbox;
use yii\helpers\Json;

return [
    [
        'header' => Checkbox::widget([
            'name' => 'select_all_rows',
            'id' => 'select_all_rows',
            'options' => ['style' => 'width:17px;']
        ]),
        'headerOptions' => [
            'class' => 'center aligned',
            'width' => '5%'
    ],
        'format' => 'raw',
        'value' => function ($model, $key, $index, $column) {
            return
                Checkbox::widget([
                    'name' => 'selection[]',
                    'options' => ['style' => 'width:17px;'],
                    'id' => $index,
                    'value' => Json::encode($key)
                ]); // . ++$index;
        },
        'contentOptions' => [
            'class' => 'center aligned select-row',
        ]
    ],
];