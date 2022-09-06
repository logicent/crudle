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
            <?= $form->field($model, "[{$rowId}]attribute_name")->dropDownList([], [
                    'class' => 'rb--attribute-name',
                    'data' => ['name' => 'attributeName']
                ]) ?>
            <?= $form->field($model, "[{$rowId}]sort_by")->checkbox([
                    'data' => ['name' => 'sortBy']
                ]) ?>
            <?= $form->field($model, "[{$rowId}]sort_order")->dropDownList([
                    null => '&nbsp;',
                    SORT_ASC => Yii::t('app', 'ASC'),
                    SORT_DESC => Yii::t('app', 'DESC')
                ], ['data' => ['name' => 'sortOrder']
                ]) ?>
            <?= $form->field($model, "[{$rowId}]filter_by")->checkbox([
                    'data' => ['name' => 'filterBy']
                ]) ?>
        </div>
        <div class="column">
        </div>
    </div>
    <div class="ui divider"></div>

    <?= Elements::button('Update Row', [
            'class' => 'compact small update-row',
            'data'  => [
                'row-id' => $rowId
            ]
        ]) ?>
</div>
<?php
ActiveForm::end() ?>
