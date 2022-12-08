<?php

use yii\helpers\Html;
use yii\helpers\Url;

return [
    'attribute' => $searchModel->listSettings->listNameAttribute,
    'format' => 'raw',
    'value' => function ($model, $key, $index, $column)
    {
        if (is_array($model)) {
            $searchModelClass = $this->context->searchModelClass();
            $model = new $searchModelClass();
        }
        $attribute = $column->attribute;
        $linkId = $model->listSettings->listIdAttribute;
        $route = $this->context->listRouteId();
        $urlParams = array_merge(
            Yii::$app->request->queryParams,
            [$route, $linkId => $model->{$linkId}]
        );

        $linkColumn = Html::a( $model->$attribute,
                            Url::to($urlParams), [
                                'style' => 'font-weight: 500',
                                'data' => [
                                    'pjax' => '0'
                                ]
                            ]);
        return $linkColumn;
    },
    'contentOptions' => [
        'style' => 'white-space: normal; width: 33%',
    ],
];