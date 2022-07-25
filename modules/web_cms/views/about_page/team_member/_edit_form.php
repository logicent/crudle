<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;


$hintOptions = [
    'tag' => 'div',
    'class' => 'text-muted',
    'style' => 'font-size: 0.95em; padding-left: 0.25em'
];

$form = ActiveForm::begin([
    'id' => $rowId . '__modal',
    'action' => false,
    'enableClientValidation' => false,
    'fieldConfig' => ['hintOptions' => $hintOptions],
    'options' => [
        'autocomplete' => 'off',
        'class' => 'ui form',
    ],
]) ?>

<div class="ui padded segment" style="margin-top: 0em">
    <div class="ui small header"><?= Yii::t('app', 'Edit item') ?></div>
    <div class="ui divider"></div>
    <div class="ui two column stackable grid">
        <div class="column">
            <?= $form->field($model, 'fullName')->textInput([
                    'maxlength' => true,
                    'data' => ['name' => 'fullName']
                ]) ?>
            <?= $form->field($model, 'designation')->textInput([
                    'maxlength' => true,
                    'data' => ['name' => 'designation']
                ]) ?>
            <?= $form->field($model, 'bio')->textArea([
                    'class' => 'small-textbox',
                    'maxlength' => true,
                    'rows' => 9,
                    'data' => ['name' => 'bio'],
                ]) ?>
            <?= $form->field($model, "inactive")->checkbox([
                    'data' => ['name' => 'inactive'],
                    'options' => ['style' => 'vertical-align: text-top']
                ]) ?>
        </div>
        <div class="column">
            <?= $this->render('@appMain/views/_form_field/file_input', [
                    'attribute' => 'photoImage',
                    'model' => $model,
                ]) ?>
        </div>
    </div>
    <div class="ui divider"></div>

    <?= Elements::button('Update Item', [
            'class' => 'compact small update-row',
            'data'  => [
                'row-id' => $rowId
            ]
        ]) ?>
</div>
<?php
ActiveForm::end() ?>