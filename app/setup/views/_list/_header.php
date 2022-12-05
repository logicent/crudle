<?php

use crudle\app\setup\enums\Type_Role;
use yii\helpers\Html;
use icms\FomanticUI\helpers\Size;
use icms\FomanticUI\modules\Modal;

?>

<div class="ui top secondary attached right aligned segment">
    <div class="ui grid">
        <div class="thirteen wide column">
            <div class="ui floated header">
                <?= Html::encode($this->title) ?>
            </div>
        </div>
        <div class="three wide column right aligned">
        <?php
            if ( Yii::$app->user->can('Create ' . $this->context->viewName() )) :
                echo Html::a(Yii::t('app', 'New'), [$context_id . 'create'], [
                    'id' => 'create_btn',
                    'class' => 'compact ui primary button show-list-form',
                ]);
            endif;

            if ( Yii::$app->user->can('Delete ' . $this->context->viewName()) ) :
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
            endif ?>
        </div>
    </div>
</div>

<?php
// echo $this->render('/_list/_delete');
$modal = Modal::begin([
    'id' => 'list_modal',
    'header' => Yii::t('app', 'Confirm Delete'),
    'closeButton' => null,
    'actions' => '
        <div class="ui cancel small button">No</div>
        <div class="ui ok small primary button">Yes</div>
    ',
    'size' => Size::TINY,
]) ?>
    <p><?= Yii::t('app', 'Are you sure you want to delete the selected rows?') ?></p>
<?php
$modal::end();

$this->registerJs( $this->render( '_form.js' ) );
$this->registerJs(<<<JS
    $('#delete_btn').on('click', function(e) {
        // keys is an array of the keys from the selected rows
        keys = $('.grid-view').yiiGridView('getSelectedRows');
        id_list = JSON.stringify(keys);
        delete_url = $(this).attr('href');
        // data = {'id_list': id_list};
        // confirmDelete(delete_url, data);
        // load modal to submit request via ajax if response = yes
        $('#list_modal')
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
                        data: {
                            'id_list': id_list,
                        },
                        success: function( response )
                        {
                            $('#setup_sidebar .item.active').click();
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
        return false; // this prevents the browser dialog from being loaded.
    });
JS);