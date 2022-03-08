<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => $model->formName(),
    'enableClientValidation' => true,
    'options' => [
        'autocomplete' => 'off',
        'class' => 'ui form modal-form',
    ],
]) ?>

<?= $this->render('//_form/_modal_header', ['model' => $model]) ?>

<div class="ui attached padded segment">
    <?= Html::activeHiddenInput($model, 'organization_id', [
            'value' => $model->isNewRecord ? Yii::$app->user->identity->person->organization_id : $model->organization_id,
    ]) ?>
    <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'message')->textarea([
            'rows' => 5, 
            'style' => 'resize: none; height: 115px;'
        ]) ?>
    <?= $form->field($model, 'inactive')->checkbox() ?>
</div>

<?php 
ActiveForm::end();
echo $this->render('//_form/_footer', ['model' => $model]);
$this->registerJs($this->render('//_form/_modal_submit.js'));
?>
