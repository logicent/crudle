<?php

use yii\helpers\Html;
use icms\FomanticUI\Elements;
use icms\FomanticUI\widgets\ActiveForm;


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
            <?= $form->field($model, 'label')->textInput(['maxlength' => true]) ?>
            <?= $model->parentLabel !== false ? $form->field($model, 'parentLabel')->dropDownList([]) : null ?>
            <?php //= $form->field($model, "iconPath")->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'iconColor')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="column">
            <?= $form->field($model, 'route')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'openInNewTab')->checkbox([
                    'options' => ['style' => 'vertical-align: text-top']
                ]) ?>
            <?= Html::activeHiddenInput($model, "type") ?>
            <?= $form->field($model, "alignRight")->checkbox([
                    'options' => ['style' => 'vertical-align: text-top']
                ]) ?>
            <?= $form->field($model, "inactive")->checkbox([
                    'options' => ['style' => 'vertical-align: text-top']
                ]) ?>
        </div>
    </div>
</div>
<?= Elements::button('Update row', [
        'class' => 'compact small update-row',
        'data'  => [
            'row-id' => $rowId
        ]
        ]);
ActiveForm::end();