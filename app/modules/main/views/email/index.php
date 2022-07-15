<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;
use Zelenin\yii\SemanticUI\modules\Select;

$this->title = Yii::t('app', 'Email');

$form = ActiveForm::begin([
        'id' => $model->formName(),
        'options' => [
            'autocomplete' => 'off',
            'class' => 'ui form ajax-submit',
        ],
    ]) ?>

    <?= $this->render('@appMain/views/_modal/header', ['model' => $model]) ?>

    <div class="ui padded segment">
        <?= $form->field( $model, 'to' )->textInput( ['maxlength' => true] ) ?>
        <?= $form->field( $model, 'cc' )->textInput( ['maxlength' => true] ) ?>
        <?= $form->field( $model, 'bcc' )->textInput( ['maxlength' => true] ) ?>
        <?= $form
                ->field ( $model, 'emailTemplate' )
                ->widget( Select::class, [
                    'search' => true,
                    'items' => []
                ]) ?>
        <?= $form->field( $model, 'subject' )->textInput( ['maxlength' => true] ) ?>
        <?= $form->field( $model, 'message' )->textarea( ['maxlength' => true] ) ?>
        <?= $form->field( $model, 'sendMeACopy' )->checkbox() ?>
        <?= $form->field( $model, 'sendReadReceipt' )->checkbox() ?>
        <?= $form->field( $model, 'attachDocumentPrint' )->fileInput() ?>
        <?= $form->field( $model, 'addAttachments' )->fileInput() ?>
        <?= $form->field( $model, 'printFormat' )->dropDownList([]) ?>

        <?= Html::a(Yii::t('app', 'Send'), ['send-email'],
                [
                    'id' => 'send_email', 
                    'class' => 'compact ui small button',
                ]) ?>
    </div>
<?php 
ActiveForm::end();
$this->registerJs($this->render('@appMain/views/_form/_submit.js'));

$this->registerJs(<<<JS

    function emailIsValid (email) {
        return /\S+@\S+\.\S+/.test(email)
    }

    $('#send_email').on('click', 
        function (e) {
            e.preventDefault();

            toAddress_el = $('#emailform-to');

            if ( $("#EmailForm").dirrty("isDirty") ) {
                alert('Save form before testing connection')
                return false;
            }

            $.ajax({
                type: 'post',
                url: $(this).attr('href'),
                data: {
                    to: toAddress_el.val(),
                },
            })
                .done(function (response) {
                    alert(response);
                })
                .fail(function () {
                    // request failed
                });
    });
JS)
?>
