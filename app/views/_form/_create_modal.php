<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\helpers\Size;
use Zelenin\yii\SemanticUI\modules\Modal;

$createModal = Modal::begin([
    'id' => 'create_modal',
    'header' => Yii::t('app', 'New ' . $this->title),
    'closeButton' => null,
    'actions' => '
        <div class="ui cancel small button">Cancel</div>
        <div class="ui ok small primary button">OK</div>
    ',
    'size' => Size::TINY,
]);
    echo Html::radioList('source', null, []);
$createModal::end();

$this->registerJs(<<<JS
    $('#create_btn').on('click', function(e)
    {
        if ($(this).data('load-modal') == true)
        {
            $('#create_modal')
                .modal({
                    closable  : true,
                    centered  : false,
                    inverted  : true,
                    approve   : '.ok', // .positive, .approve, 
                    deny      : '.cancel', // .negative, .deny, 
                    onDeny    : function(e) {
                        // close the dialog
                        $(this).modal('hide');
                        return false;
                    },
                    onApprove : function(e) {
                        // close the dialog
                        $(this).modal('hide');
                        // send request via AJAX and redirect
                    }
                })
                .modal('show');
            return false;
        }
    });
JS) ?>