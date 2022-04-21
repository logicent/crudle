<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\modules\Select;

$this->title = Yii::t('app', 'SMTP Settings');
?>

<div class="ui attached padded segment">
    <div class="two fields">
        <?= $form->field( $model, 'smtp_host' )->textInput( ['maxlength' => true] ) ?>
        <?= $form->field( $model, 'smtp_port' )->textInput( ['maxlength' => true] ) ?>
    </div>
    <div class="two fields">
        <?= $form->field( $model, 'smtp_username' )->textInput( ['maxlength' => true] ) ?>
        <?= $form->field( $model, 'smtp_password' )->passwordInput( ['maxlength' => true] ) ?>
    </div>
    <div class="two fields">
        <?= $form->field ( $model, 'smtp_encryption' )->widget( Select::class, [
                    'search' => true,
                    'items' => [
                        ' ' => '(None)',
                        'ssl' => 'SSL',
                        'tls' => 'TLS/STARTTLS'
                    ]
                ]) ?>
        <?= $form->field( $model, 'smtp_timeout' )->textInput( ['maxlength' => true] ) ?>
    </div>
</div>

<div class="ui attached padded segment">
    <div class="two fields">
        <?= $form->field( $model, 'from_address' )->textInput( ['maxlength' => true] ) ?>
        <?= $form->field( $model, 'from_name' )->textInput( ['maxlength' => true] ) ?>
    </div>
    <div class="field">
        <?= Html::a(Yii::t('app', 'Test connection'), ['test-connection'],
                [
                    'id' => 'test_connection', 
                    'class' => 'compact ui small button',
                ]) ?>
    </div>
</div>
<?php
$this->registerJs(<<<JS
    function emailIsValid (email) {
        return /\S+@\S+\.\S+/.test(email)
    }

    $('#test_connection').on('click', 
        function (e) {
            e.preventDefault();

            fromAddress_el = $('#smtpsettingsform-from_address');
            fromName_el = $('#smtpsettingsform-from_name');

            if ( fromAddress_el.val() == '' || emailIsValid(fromAddress_el.val()) === false)
            {
                fromAddress_el.parent('div').addClass('required error');
                fromAddress_el.siblings('div.ui.red.pointing.label').text('A valid from address is required to test connection.');
                return false;
            }

            if ( fromName_el.val() == '' )
            {
                fromName_el.parent('div').addClass('required error');
                fromName_el.siblings('div.ui.red.pointing.label').text('From name is required to test connection.');
                return false;
            }

            if ( $("#SmtpSettingsForm").dirrty("isDirty") ) {
                alert('Save form before testing connection')
                return false;
            }

            $.ajax({
                type: 'post',
                url: $(this).attr('href'),
                data: {
                    from_address: fromAddress_el.val(),
                    from_name: fromName_el.val(),
                },
            })
                .done(function (response) {
                    alert(response);
                })
                .fail(function () {
                    // request failed
                });
    });
JS);
