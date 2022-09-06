<?php

use crudle\app\setup\enums\Type_Permission;
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
        $controllerId = StringHelper::basename( $this->context->id );
        $linkColumn = Html::a( $model->$attribute,
                            Url::to(['/'. $this->context->module->id .'/'. $controllerId .'/'. $action, 'id' => $model->$attribute]),
                            [
                                'style' => 'font-weight: 500',
                                'data' => [
                                    'pjax' => '0'
                                ]
                            ]);
        return $linkColumn;
        // return
        //     Html::tag('div',
        //         Html::tag('div',
        //             $linkColumn,
        //             ['class' => 'twelve wide column']
        //         ) .
        //         Html::tag('div',
        //                 $model->listSettings->listIdAttribute === false ? null : $model->{$model->listSettings->listIdAttribute},
        //                 [
        //                     'class' => 'right aligned four wide column text-muted',
        //                     'style' => 'font-size: 97.5%; font-weight: 500'
        //                 ]
        //             ),
        //         ['class' => 'ui two column stackable grid']
        //     );
    },
    'contentOptions' => [
        'style' => 'white-space: normal; width: 40%',
    ],
];
