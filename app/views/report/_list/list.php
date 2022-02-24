<?php

use app\helpers\DateTimeHelper;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\GridView;
use app\assets\DataTableAsset;
use yii\helpers\Json;
use Zelenin\yii\SemanticUI\modules\Checkbox;

DataTableAsset::register($this);

$this->title = Yii::t('app', '{reportTitle}', ['reportTitle' => $reportTitle])
?>

<?= $this->render('header') ?>

<div class="ui bottom attached padded segment">
<?php
    echo GridView::widget([
        'layout' => "{items}\n{pager}",
        'tableOptions' => [
            'class' => 'ui very basic table'
        ],
        'caption' => isset($caption) ? $caption : null,
        'captionOptions' => ['class' => 'ui left aligned small secondary header basic segment text-muted', 'style' => 'font-weight: 500'],
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
                        return 
                            Html::tag('span', 
                                DateTimeHelper::getShortRelativeTime( $model->updated_at ),
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
    // export list
JS)
?>
</div>
