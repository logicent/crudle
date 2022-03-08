<?php

use app\helpers\StatusMarker;
use yii\helpers\Html;
use yii\helpers\Json;

$this->title = Yii::t('app', 'Email Queue');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tool'), 'url' => ['/tool']];

$columns = [
    [
        'attribute' => 'id',
        'format' => 'raw',
        'value' => function ($model, $key, $index, $column)
        {
            $id = $column->attribute;
            return
                Html::a($model->$id, [
                            $this->context->id . '/read', 
                            'id' => $model->$id
                        ], [
                            'class' => ' show-list-form',
                            'data' => [
                                'id' => $model->id,
                            ],
                            'style' => 'font-weight: 500',
                        ]);
        },
        'visible' => false,
    ],
    [
        'attribute' => 'subject',
        'format' => 'raw',
        'value' => function ($model, $key, $index, $column) {
            return
                Html::a($model->subject, [
                            $this->context->id . '/read',
                            'id' => $model->id
                        ], [
                            'class' => ' show-list-form',
                            'data' => [
                                'id' => $model->id,
                            ],
                            'style' => 'font-weight: 500',
                        ]);
        },
    ],
    [
        'attribute' => 'to',
        'value' => function ($model, $key, $index, $column) {
            $to = Json::decode($model->to);
            return implode('', $to); // weired
        }
    ],
    [
        'attribute' => 'status',
        'format' => 'raw',
        'value' => function ($model)
        {
            if (!empty($model->status)) :
                $marker = StatusMarker::icon('check circle', $model, 'status');
                return $marker .'&nbsp;'. $model->status;
            endif;
        },
        'contentOptions' => [
            'style' => 'font-weight: 500',
        ],
        'filter' => [' ' => 'All',
            '-1' => 'Not Sent',
            '0' => 'Error',
            '1' => 'Sent',
        ]
    ],
];

$controller = $this->context->id;

echo $this->render('//_list/GridView', [
    'dataProvider' => $dataProvider, 
    'searchModel' => $searchModel,
    'columns'       => $columns
]) ?>
