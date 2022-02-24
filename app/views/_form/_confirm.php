<?php

use Zelenin\yii\SemanticUI\helpers\Size;
use Zelenin\yii\SemanticUI\modules\Modal;

$modal = Modal::begin([
    'id' => 'confirm_action_modal',
    'header' => Yii::t('app', 'Confirm ' . $action),
    'closeButton' => null,
    'actions' => '
        <div class="ui cancel small button">No</div>
        <div class="ui ok small primary button">Yes</div>
    ',
    'size' => Size::TINY,
]) ?>
    <p><?= Yii::t('app', "Are you sure you want to {$action}?") ?></p>
<?php
$modal::end();

$this->registerJs(<<<JS
// load modal to submit request via ajax if response = yes
function confirmAction(url, data = null) {
    $('#confirm_action_modal')
        .modal({
            closable  : true,
            centered  : false,
            inverted  : true,
            approve   : '.ok', // .positive, .approve, 
            deny      : '.cancel', // .negative, .deny, 
            onDeny    : function() {
                // close the dialog
                $(this).modal('hide');
                return false;
            },
            onApprove : function() {
                $(this).modal('hide'); // close the dialog
                console.log(url);
                $.ajax({
                    url: url,
                    type: 'post',
                    data: data,
                    success: function( response ) {
                        location.reload(); // refresh current view
                    },
                    error: function( jqXhr, textStatus, errorThrown ) {
                        console.log( errorThrown );
                    }
                });
            }
        })
        .modal('show');
    }
JS) ?>