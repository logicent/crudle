<?php

use crudle\app\helpers\StatusMarker;

$modelClass = $this->context->modelClass();

return [
    'attribute' => $modelClass::enums()['status']['attribute'],
    'label' => Yii::t('app', 'Status'),
    'format' => 'raw',
    'value' => function ( $model ) {
        $attribute = $model::enums()['status']['attribute'];
        $hasStatus = array_key_exists($attribute, $model->attributes);
        if ( $hasStatus )
            return 
                StatusMarker::icon('check circle', $model, $attribute) . '&nbsp;' . 
                StatusMarker::label($model, $attribute);
    },
    'contentOptions' => [
        'style' => 'font-weight: 500',
    ],
    'visible' => in_array($modelClass::enums()['status']['attribute'], $modelClass::attributes())
];