<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => $rowId . '__modal',
    'action' => false,
    'enableClientValidation' => false,
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
            <?= $form->field($model, "label")->textInput(['maxlength' => true, 'data' => ['name' => 'label']]) ?>
            <?= $form->field($model, "route")->textInput(['maxlength' => true, 'data' => ['name' => 'route']]) ?>
            <?= $form->field($model, "group")->textInput(['maxlength' => true, 'data' => ['name' => 'group']]) ?>
            <?= $form->field($model, "inactive")->checkbox([
                    'data' => ['name' => 'inactive'],
                    'options' => ['style' => 'vertical-align: text-top']
                ]) ?>
        </div>
        <div class="column">
            <?= Html::activeHiddenInput($model, "type", ['data' => ['name' => 'type']]) ?>
            <?= $form->field($model, "icon")->textInput(['maxlength' => true, 'data' => ['name' => 'icon']]) ?>
            <?= $form->field($model, "iconPath")->textInput(['maxlength' => true, 'data' => ['name' => 'iconPath']]) ?>
            <?= $form->field($model, "iconColor")->textInput(['maxlength' => true, 'data' => ['name' => 'iconColor']]) ?>
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