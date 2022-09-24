<?php

use yii\helpers\Html;

return [
    // 'attribute' => 'id',
    'label' => false,
    'format' => 'raw',
    // 'headerOptions' => ['class' => 'right aligned'],
    'value' => function( $model ) {
        return Html::tag('div', $model->{$model->listSettings->listIdAttribute}, ['class' => 'text-muted']);
    },
    'contentOptions' => ['class' => 'right aligned']
];