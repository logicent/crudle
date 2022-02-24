<?php

use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\helpers\Url;
use Zelenin\yii\SemanticUI\Elements;

$isReadonly = $this->context->action->id == 'read' || $this->context->action->id == 'print-preview';
?>

<div class="eight wide field required">
<?php
if ($isReadonly) :
    echo $form->field ( $model, 'id' )->textInput( ['maxlength' => true, 'readonly' => true] );
else :
    echo Html::activeLabel( $model, 'id' ) ?>
    <div class="ui action input">
    <?= Html::activeTextInput( $model, 'id', ['maxlength' => true] ) .
        Elements::button(Yii::t('app', 'Get ID'), [
            'class' => 'tiny get-id',
            'data' => [
                'url' => Url::to(['auto-suggest-id']),
                'form_id' => $model->formName(),
                'field_id' => Inflector::camel2id( $model->formName(), '' ) .'-'. 'id',
            ]
        ]) ?>
    </div>
<?php
endif ?>
</div>

<?php
$this->registerJs(<<<JS
    $('.get-id').on('click', function ()
    {
        if ( $('#source_id').val() == '' || $('#source_id').val() == ' ' )
        {
            // $('#source_id').focus();
            labelText = $('#source_id').parent('div').siblings('label').text();
            // replace with SweetAlert
            alert('You must enter the ' + labelText + ' id first:');
            return false;
        }
        else {
            fieldId = $('#' + $(this).data('field_id'));
            form = $('#' + $(this).data('form_id'));

            $.ajax({
                url: $(this).data('url'),
                type: 'post',
                data: form.serializeArray(),
                success: function( response )
                {
                    fieldId.val( response );
                },
                error: function( jqXhr, textStatus, errorThrown )
                {
                    console.log( errorThrown );
                }
            });
        }
    });
JS) ?>
