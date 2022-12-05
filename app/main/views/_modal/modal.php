<?php

use yii\helpers\Html;
use icms\FomanticUI\helpers\Size;
use icms\FomanticUI\modules\Modal;

$modal = Modal::begin([
    'id' => $modalId,
    'header' => Yii::t('app', '{modalTitle}', ['modalTitle' => $modalTitle]),
    'closeButton' => null,
    'actions' => <<<HTML
        <div class="ui cancel small button">
            <?= Yii::t('app', '{negativeLabel}', ['negativeLabel' => $negativeLabel] ?>
        </div>
        <div class="ui ok small primary button">
            <?= Yii::t('app', '{positiveLabel}', ['positiveLabel' => $positiveLabel ?>
        </div>
    HTML,
    'size' => Size::TINY,
]);
    echo $content;
$modal::end();

// event trigger
// btn_click
// event rule
// if ($(this).data('load-modal') == true)
// event AJAX callback
// url, data, onSuccess

$this->registerJs(<<<JS
    $('.modal--close-btn').on('click', function(e)
    {
        modalContainer = $(this).closest('.modal');
        modalContainer.modal(
        {
            closable  : true,
            centered  : false,
            inverted  : true,
            approve   : '.ok', // .positive, .approve, 
            deny      : '.cancel', // .negative, .deny, 
            onDeny    : function(e) {
                // close the dialog
                modalContainer.modal('hide');
                return false;
            },
            onApprove : function(e) {
                // close the dialog
                modalContainer.modal('hide');
                // send request via AJAX and redirect
                // $.ajax({
                //     url: url,
                //     type: 'post',
                //     data: data,
                //     success: function( response ) {
                //         location.reload(); // refresh current view
                //     },
                //     error: function( jqXhr, textStatus, errorThrown ) {
                //         console.log( errorThrown );
                //     }
                // });
            }
        })
        .modal('show');
        return false;
    });
JS);