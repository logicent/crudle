<?php

use crudle\app\setup\enums\Status_Transaction;
use crudle\app\setup\enums\Type_Permission;
use yii\helpers\Html;
use icms\FomanticUI\Elements;


$controller = $this->context;

echo Html::a(Elements::icon('refresh'), ['refresh'], [
        'id' => 'refresh_btn',
        'class' => 'compact ui basic icon button',
    ]);
echo Html::tag('span', '&nbsp;');
echo Html::a(Yii::t('app', 'Show filters'), false, [ // zoom, Elements::icon('toggle off')
        'id' => 'show_filters',
        'class' => 'compact ui filter button',
    ]);
echo Html::a(Yii::t('app', 'Hide filters'), false, [ // zoom out, Elements::icon('toggle on')
        'id' => 'hide_filters',
        'class' => 'compact ui filter button',
        'style' => 'display: none'
    ]);
echo $this->render('@appMain/views/list/_menu');
// Note: list view does not have a model instance
if ( Yii::$app->user->can(Type_Permission::Create .' '. $controller->viewName()) ) :
    echo Html::a(Yii::t('app', 'New'), ['create'], [
            'id' => 'create_btn',
            'class' => 'compact ui primary button',
            'data' => [
                // pre-select-modal options
                'load-modal' => isset($model->source) ? 'true' : 'false'
            ]
        ]);
endif;
// Note: list view does not have a model instance
if ( Yii::$app->user->can( Type_Permission::Delete .' '. $controller->viewName() ) ) :
    echo Html::a(Yii::t('app', 'Delete'), ['delete-many'], [
        'id' => 'delete_btn',
        'class' => 'compact ui primary button',
        'data' => [
            // remove if custom modal works or use return false to override confirm dialog
            'confirm' => Yii::t('app', 'Confirm you want to delete the selected rows?'),
            'method' => 'post',
        ],
        'style' => 'display: none'
    ]);
endif;
echo $this->render('@appMain/views/_modal/confirm_action', ['action' => Status_Transaction::Submit]);
echo $this->render('@appMain/views/list/_action/batch_menu/delete');

$this->registerJs(<<<JS
    $('#delete_btn').on('click', function(e) {
        // keys is an array of the keys from the selected rows
        keys = $('.grid-view').yiiGridView('getSelectedRows');
        id_list = JSON.stringify(keys);
        delete_url = $(this).attr('href');
        data = {'id_list': id_list};
        confirmDelete(delete_url, data);
        return false; // this prevents the browser dialog from being loaded.
    });

    if (window.location.search) {
        $('.filters').show();

        $('#hide_filters').show();
        $('#show_filters').hide();
    }

    $('.filter.button').on('click', function(e) 
    {
        $('.filters').toggle();

        if (e.target.id == 'show_filters') {
            $(this).hide();
            $('#hide_filters').show();
        }
        if (e.target.id == 'hide_filters') {
            $(this).hide();
            $('#show_filters').show();
        }
    });
JS);