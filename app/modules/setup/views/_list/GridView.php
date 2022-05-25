<?php

use crudle\app\helpers\DateTimeHelper;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\GridView;
use Zelenin\yii\SemanticUI\Elements;
use crudle\app\assets\DataTable;
use crudle\app\helpers\StatusMarker;
use yii\helpers\Json;
use Zelenin\yii\SemanticUI\modules\Checkbox;

DataTable::register($this);

$this->title = Yii::t('app', '{listTitle}', ['listTitle' => $listTitle])
?>

<?= $this->render('_header', ['context_id' => $context_id]) ?>

<div class="ui bottom attached padded segment">
<?php
    echo GridView::widget([
        'layout' => "{items}\n{pager}",
        'tableOptions' => [
            'class' => 'ui very basic table'
        ],
        'caption' => isset($caption) ? $caption : null,
        'captionOptions' => [
            'class' => 'ui left aligned small secondary header basic segment text-muted',
            'style' => 'font-weight: 500'
        ],
        'dataProvider' => $dataProvider,
        'columns'  => ArrayHelper::merge(
            [
                [
                    'class' => 'Zelenin\yii\SemanticUI\widgets\CheckboxColumn',
                    'header' => Checkbox::widget([
                        'name' => 'select_row',
                        // 'checked' => false, // default false
                    ]),
                    // 'headerOptions' => [
                    //     'id' => 'select_all_rows'
                    // ],
                    // 'content' => function ($model, $key, $index, $column) {
                    //     return Checkbox::widget([
                    //         'name' => $key
                    //     ]);
                    // },
                    'checkboxOptions' => function ($model, $key, $index, $column) {
                        return [
                            'class' => 'select-row',
                            'id' => $index,
                            'value' => Json::encode($key),
                        ];
                    },
                    // 'contentOptions' => [
                    // ],
                    // 'visible' => false
                ],
                [
                    'attribute' => 'id',
                    'format' => 'raw',
                    'value' => function ($model, $key, $index, $column)
                    {
                        $id = $column->attribute;
                        return
                            Html::a($model->$id, [
                                        $this->context->id . '/update', 
                                        'id' => $model->$id
                                    ], [
                                        'class' => ' show-list-form',
                                        'data' => [
                                            'id' => $model->id,
                                        ],
                                        'style' => 'font-weight: 500',
                                    ]);
                    },
                    'visible' => $hideId ? false : true,
                ],
                [
                    'attribute' => 'inactive',
                    'label' => Yii::t('app', 'Status'),
                    'format' => 'raw',
                    'value' => function ( $model ) {
                        $hasStatus = array_key_exists('inactive', $model->attributes);
                        if ( $hasStatus )
                            return 
                                StatusMarker::icon('check circle', $model, 'inactive') . '&nbsp;' .
                                StatusMarker::label($model, 'inactive');
                    },
                    'contentOptions' => [
                        'style' => 'font-weight: 500',
                    ],
                    // 'visible' => in_array('inactive', $modelClass::attributes())
                ],
            ],
            $columns,
            [
                [
                    'header' => Yii::t('app', 'Last update'),
                    'headerOptions' => ['class' => 'center aligned'],
                    'format' => 'raw',
                    'contentOptions' => [
                        'class' => 'right aligned'
                    ],
                    'value' => function ($model) {
                        if ($model->commentsCount > 0) :
                            $comment = 'comments';
                        else :
                            $comment = 'comments outline';
                        endif;
                        return 
                            Html::tag('span', 
                                DateTimeHelper::getShortRelativeTime( $model->updated_at ) .'&ensp;'. Elements::icon($comment, ['ui grey']) .'&nbsp;'. $model->commentsCount,
                                ['class' => 'text-muted']
                            );
                    }
                ]
            ],
        ) // array merge
    ]);
$this->registerJs(<<<JS
    if ($('.ui .table > tbody > tr').length > 1) {
        $('.ui .table').DataTable({
            stateSave: true,
        });
    }

    $('.grid-view').on('click', '.ui.checkbox', function(e) 
    {
        el_select_row = $(this).find(':checkbox');
        if (el_select_row.prop('checked'))
        {
            $('#delete_btn').show();
            $('#create_btn').hide();
        }
        else {
            // check for count of other selected rows
            if ($('.ui.checkbox.checked').length == 0)
            {
                $('#delete_btn').hide();
                $('#create_btn').show();
            }
        }
    });
JS)
?>
</div>
