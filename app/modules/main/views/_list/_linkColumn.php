<?php

use crudle\setup\enums\Type_Permission;
use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\helpers\Url;

return [
    'attribute' => $searchModel->listSettings->listNameAttribute,
    'format' => 'raw',
    'value' => function ($model, $key, $index, $column)
    {
        if ($model->userCan(Type_Permission::Update) && !$model->lockUpdate()) :
            $action = 'update';
        else :
            $action = 'read';
        endif;
        $attribute = $column->attribute;
        $controllerId = Inflector::camel2id(
                            StringHelper::basename( $this->context->modelClass() )
                        );
        return
            Html::tag('div',
                Html::tag('div',
                    Html::a( $model->$attribute,
                        Url::to(['/'. $this->context->module->id .'/'. $controllerId .'/'. $action, 'id' => $model->id]), // ActionUrl::get()
                        [
                            'style' => 'font-weight: 500',
                            'data' => [
                                'pjax' => '0'
                            ]
                        ]
                    ),
                    ['class' => 'twelve wide column']
                ) .
                    Html::tag('div',
                        !empty($model->listSettings->listIdAttribute) ? $model->{$model->listSettings->listIdAttribute} : $model->id,
                        ['class' => 'right aligned four wide column text-muted', 'style' => 'font-size: 97.5%; font-weight: 500']
                    ),
                ['class' => 'ui two column stackable grid']
            );
    },
    'contentOptions' => [
        'style' => 'white-space: normal; width: 40%',
    ],
];