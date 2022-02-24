<?php

use app\enums\Type_Model;
use app\helpers\SelectableItems;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\modules\Select;
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
    <div class="two fields">
        <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'inactive')->checkbox()->label('&nbsp;') ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'data_model')->widget(Select::class, [
                'items' => Type_Model::enums(),
                'options' => ['maxlength' => true]
            ]) ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'from_address_field')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'to_address_field')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'cc_recipients_field')->textarea([
                'rows' => 3, 
                'style' => 'resize: none; height: 115px;'
            ]) ?>
    </div>
</div>

<?php 
ActiveForm::end();
echo $this->render('//_form/_footer', ['model' => $model]);
$this->registerJs($this->render('//_form/_modal_submit.js'));
?>
