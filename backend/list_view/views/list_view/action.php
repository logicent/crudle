<?php

use yii\helpers\Html;

$controller = $this->context;

// use button group here
if (isset($controller->viewActions()[$controller->action->id])) :
    foreach($controller->viewActions()[$controller->action->id] as $viewAction) :
        echo $this->renderFile($controller->viewPath . '/_action/' . $viewAction . '.php');
    endforeach;
endif;

// use dropdown menu here
// if($controller->showBatchActions()) :
//     echo $this->renderFile($controller->viewPath . '/_menu/batch.php');
// endif;

if ($controller->showViewTypeSwitcher())
    echo $this->render('_actions/view_switcher');

if (isset($controller->mainAction()[$controller->action->id])) :
    $mainAction = $controller->mainAction()[$controller->action->id];
    $options = ['class' => 'compact small primary ui button'];
    echo Html::a(
        Yii::t('app', $mainAction['label']),
        isset($mainAction['hasParams']) && $mainAction['hasParams'] == true ? 
            array_merge([$mainAction['route']], Yii::$app->request->queryParams) :
            [$mainAction['route']],
        isset($mainAction['options']) ? array_merge($options, $mainAction['options']) : $options
    );
endif;

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