<?php

use yii\helpers\Url;

use Zelenin\yii\SemanticUI\widgets\ActiveForm;

$this->title = Yii::t('app', 'Change Password');

$form = ActiveForm::begin([
        'id' => $model->formName(),
        'options' => [
                'autocomplete' => 'off',
                'class' => 'ui form modal-form',
                'data' => ['modal_id' => 'change_pwd']
        ],
]); ?>

<?= $this->render('/_form/_modal_header', ['model' => $model]) ?>

<div class="ui attached padded segment">
        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true])->label(Yii::t('app', 'Current Password')) ?>
        <?= $form->field($model, 'new_password')->passwordInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'send_password_update_notification')
                ->checkbox()
        // ->label(Yii::t('app', 'Send password change email notification')) 
        ?>
</div>

<?php 
ActiveForm::end();
$this->registerJs($this->render('/_form/_modal_submit.js')); 
?>