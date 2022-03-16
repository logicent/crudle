<?php

use app\modules\setup\enums\Type_Permission;
use app\helpers\DateTimeHelper;
use app\helpers\StatusMarker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Inflector;
use yii\helpers\Json;
use yii\helpers\StringHelper;
use Zelenin\yii\SemanticUI\widgets\GridView;
use Zelenin\yii\SemanticUI\widgets\Pjax;
use Zelenin\yii\SemanticUI\Elements;

$modelClass = $this->context->modelClass;
$emptyText = "No {$this->context->resourceName} found.";
$resource = $this->context->id;
$newBtnLabel = Yii::t('app', 'New') . '&nbsp;' . Inflector::titleize($resource);
$newBtnUrl = Url::to(['create']);
$showListCaptions = $searchModel->getLayoutSettings('showHelpInfo');
?>

<div class="<?= $resource ?>-index">
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        // 'afterRow' => function ( $model, $key, $index, $grid ) { return null; },
        // 'beforeRow' => function ( $model, $key, $index, $grid ) { return null; },
        'caption' => isset($caption) && (bool) $showListCaptions ? $caption : null,
        'captionOptions' => ['class' => 'ui header text-muted', 'style' => 'font-weight: 500'],
        // 'dataColumnClass' => 'yii\grid\DataColumn',
        // 'emptyCell' => '&nbsp;',
        'dataProvider' => $dataProvider,
        'emptyText' => Yii::t('app', '{emptyTextLabel}', ['emptyTextLabel' => $emptyText]),
        'emptyTextOptions' => ['class' => 'ui small header center aligned text-muted'],
        // 'emptyText' => "<div class='ui placeholder segment'>
        //                     <div class='ui icon header'>
        //                     <i class='video play icon'></i>
        //                         {$emptyText}
        //                     </div>
        //                     <a class='compact ui small primary button' href='{$newBtnUrl}'>{$newBtnLabel}</a>
        //                 </div>",
        // 'filterErrorOptions' => ['class' => 'help-block'],
        // 'filterErrorSummaryOptions' => ['class' => 'error-summary'],
        'filterModel' => $searchModel,
        // 'filterOnFocusOut' => true,
        // 'filterPosition' => GridView::FILTER_POS_HEADER,
        'filterRowOptions' => ['class' => 'filters', 'style' => 'display: none'],
        // 'filterSelector' => null,
        // 'filterUrl' => null,
        // 'footerRowOptions' => [],
        // 'formatter' => null,
        // 'headerRowOptions' => [],
        'layout' => "{items}\n{pager}", // {summary} {errors} {sorter}
        // 'options' => ['class' => 'grid-view'],
        // 'placeFooterAfterBody' => false,
        // 'rowOptions' => function ( $model, $key, $index, $grid ) { return []; },
        // 'showFooter' => false,
        // 'showHeader' => true,
        // '$showOnEmpty' => true,
        'tableOptions' => ['class' => 'ui padded table'],
        'columns' => ArrayHelper::merge(
            [
                [
                    'class' => 'Zelenin\yii\SemanticUI\widgets\CheckboxColumn',
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
                ],
                [
                    'class' => 'yii\grid\SerialColumn',
                    'visible' => false
                ],
                [
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
                                            StringHelper::basename( $this->context->modelClass )
                                        );
                        return
                            Html::tag('div',
                                Html::tag('div',
                                    Html::a( $model->$attribute,
                                        [ $controllerId .'/'. $action, 'id' => $model->id], // ActionUrl::get()
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
                ],
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => function ( $model ) {
                        $hasStatus = array_key_exists('status', $model->attributes);
                        if ( $hasStatus )
                            return 
                                StatusMarker::icon('check circle', $model, 'status') . '&nbsp;' . 
                                StatusMarker::label($model, 'status');
                    },
                    'contentOptions' => [
                        'style' => 'font-weight: 500',
                    ],
                    'visible' => in_array('status', $modelClass::attributes())
                ],
            ],
            $columns,
            [
                [
                    'attribute' => 'id',
                    'label' => false,
                    'format' => 'raw',
                    'headerOptions' => ['class' => 'right aligned'],
                    'value' => function( $model ) {
                        return Html::tag('div', $model->id, ['class' => 'text-muted']);
                    },
                    'contentOptions' => ['class' => 'right aligned']
                ],
                [
                    // 'attribute' => 'updated_at',
                    // 'label' => Yii::t('app', 'Last Updated'),
                    'format' => 'raw',
                    'header' => $dataProvider->getCount() . ' of ' . $dataProvider->getTotalCount(),
                    'headerOptions' => ['class' => 'text-muted right aligned'],
                    // 'filter' => false,
                    'contentOptions' => [
                        'class' => 'right aligned text-muted'
                    ],
                    'value' => function ($model) {
                        if ($model->commentsCount > 0) :
                            $comment = 'comments';
                        else :
                            $comment = 'comments outline';
                        endif;
                        return
                            Html::tag(
                                'span',
                                DateTimeHelper::getShortRelativeTime( $model->updated_at ) . '&ensp;' . Elements::icon($comment, ['grey']) . '&nbsp;' . $model->commentsCount,
                                ['class' => 'text-muted']
                            );
                    }
                ]
            ]
        )
        // [
        //     'class' => 'Zelenin\yii\SemanticUI\widgets\ActionColumn',
        //     // 'template' => '<div class="ui basic tiny compact icon buttons">{view}{update}{delete}</div>',
        //     'buttons' => [
        //         'delete' => function ($url, $model, $key) {
        //             return Html::a(Elements::icon('trash outline', ['class' => 'red']), $url, [
        //                 'class' => 'ui button',
        //                 'title' => Yii::t('yii', 'Delete'),
        //                 'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
        //                 'data-method' => 'post',
        //                 'data-pjax' => '0',
        //             ]);
        //         },
        //     ],
        //     // 'contentOptions' => ['width' => '80px']
        // ],
        // ],
    ]) ?>
    <?php Pjax::end() ?>
</div>

<?php
$this->registerJs(<<<JS
    // $(document).on('pjax:send', function() {
    //     $('#loading').show()
    // })
    $(document).on('pjax:complete', function() {
        if (window.location.search) {
            $('.filters').show();

            $('#hide_filters').show();
            $('#show_filters').hide();
        }
        // $('#loading').hide()
    })

    $('.grid-view').on('click', '.ui.checkbox', function(e) 
    {
        el_select_row = $(this).find('input');
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
    })
JS) ?>
