<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Inflector;
use icms\FomanticUI\widgets\GridView;
use icms\FomanticUI\widgets\Pjax;

$emptyText = "No {$this->context->viewName()} found.";
$controllerId = $this->context->id;
$newBtnLabel = Yii::t('app', 'New') . '&nbsp;' . Inflector::titleize($controllerId);
$newBtnUrl = Url::to(['create']);
$showListCaptions = $searchModel->getLayoutSettings('showHelpInfo');
?>

<div class="<?= $controllerId ?>-index">
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
        'layout' => "{summary}\n{items}\n{pager}\n{errors}", // {sorter}
        // 'options' => ['class' => 'grid-view'],
        // 'placeFooterAfterBody' => false,
        // 'rowOptions' => function ( $model, $key, $index, $grid ) { return []; },
        // 'showFooter' => false,
        // 'showHeader' => true,
        // '$showOnEmpty' => true,
        'summary' => 'Showing <b>{begin} - {end}</b> of <b>{totalCount}</b> objects.', // 
        'summaryOptions' => ['class' => 'text-muted', 'style' => 'text-align: right;'],
        'tableOptions' => ['class' => 'ui padded striped selectable single line primary table'],
        'columns' => $viewColumns,
        // 'columns' => ArrayHelper::merge(
        //     [
        //         $checkboxColumn,
        //         $linkColumn,
        //         $statusColumn,
        //     ],
        //     $viewColumns,
        //     [
        //         $idColumn,
        //         $tsColumn,
        //     ]
        // )
        // [
        //     'class' => 'icms\FomanticUI\widgets\ActionColumn',
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

    $('.grid-view').on('click', '.ui.checkbox',  function(e) 
    {
        el_select_all_rows = $(this).find('.select-on-check-all');
        if (el_select_all_rows.prop('checked'))
        {
            $('.ui.table > tbody > tr').css('background', 'aliceblue');
        }
        else {
            $('.ui.table > tbody > tr').css('background', 'none');
        }
    });

    $('.grid-view').on('click', '#select_all_rows', function(e) 
    {
        el_select_all_rows = $(this).find('input');
        el_select_rows = $(this).closest('table').find('tbody td.select-row');
        el_select_rows.each(function(i) {
            input = $(this).find('input');
            if (el_select_all_rows.prop('checked')) {
                input.prop('checked', true);
                $(this).closest('tr').css('background', 'aliceblue');   
                $('#delete_btn').show();
                $('#create_btn').hide();
            }
            else {
                input.prop('checked', false);
                $(this).closest('tr').css('background', 'none');
                if ($('.ui.checkbox.checked').length == 0) {
                    $('#delete_btn').hide();
                    $('#create_btn').show();
                }
            }
        });
    })

    $('.grid-view').on('click', '.ui.checkbox', function(e) 
    {
        el_select_rows = $(this).closest('tbody').find('td.select-row');
        el_select_rows.each(function(i) {
            input = $(this).find('input');
            if (input.prop('checked')) {
                $(this).closest('tr').css('background', 'aliceblue');
                $('#delete_btn').show();
                $('#create_btn').hide();
            }
            else {
                $(this).closest('tr').css('background', 'none');
                // check for count of other selected rows
                if ($('.ui.checkbox.checked').length == 0) {
                    $('#delete_btn').hide();
                    $('#create_btn').show();
                }
            }
        });
    })
JS);
