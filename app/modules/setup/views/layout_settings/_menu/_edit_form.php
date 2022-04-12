<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => $model->formName(),
    'enableClientValidation' => false,
    'options' => [
        'autocomplete' => 'off',
        'class' => 'ui form',
    ],
]) ?>
<div class="ui padded segment">
    <div class="ui two column stackable grid">
        <div class="column">
            <?= $form->field($model, "[$rowId]label")->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, "[$rowId]route")->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, "[$rowId]group")->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, "[$rowId]inactive")->checkbox([
                    'options' => ['style' => 'vertical-align: text-top']
                ]) ?>
        </div>
        <div class="column">
            <?= Html::activeHiddenInput($model, "[$rowId]type") ?>
            <?= $form->field($model, "[$rowId]icon")->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, "[$rowId]iconPath")->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, "[$rowId]iconColor")->textInput(['maxlength' => true]) ?>
        </div>
    </div>
</div>
<?php
ActiveForm::end() ?>