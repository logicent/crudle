<?php

use Zelenin\yii\SemanticUI\helpers\Size;
use Zelenin\yii\SemanticUI\modules\Modal;

$modal = Modal::begin([
    'id' => 'confirm_delete_modal',
    'header' => Yii::t('app', 'Confirm Delete'),
    'closeButton' => null,
    'actions' => '
        <div class="ui cancel small button">No</div>
        <div class="ui ok small primary button">Yes</div>
    ',
    'size' => Size::TINY,
]) ?>
    <p><?= Yii::t('app', 'Are you sure you want to perform delete operation?') ?></p>
<?php
$modal::end();

$this->registerJs(<<<JS
    // load modal to submit request via ajax if response = yes
function confirmDelete(delete_url, data = null) {
    $('#confirm_delete_modal')
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
                // close the dialog
                $(this).modal('hide');
                // post delete
                $.ajax({
                    url: delete_url,
                    type: 'post',
                    data: data,
                    success: function( response )
                    {
                        // refresh the list view
                        location.reload();
                    },
                    error: function( jqXhr, textStatus, errorThrown )
                    {
                        console.log( errorThrown );
                    }
                });
            }
        })
        // .modal('hide dimmer') // not working !!
        .modal('show');
}
JS) ?>