<?php

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

<div class="ui top attached padded segment" style="margin-top: 0em">
    <div class="ui small header"><?= Yii::t('app', 'Edit item') ?></div>
</div>

    <?= $this->render('@appSetup/views/data_widget/field_inputs', [
            'model' => $model,
            'form' => $form,
            'rowId' => $rowId
        ]) ?>

<div class="ui bottom attached padded segment" style="margin-top: 0em">
    <?= Elements::button('Update Item', [
            'class' => 'compact small update-row',
            'data'  => [
                'row-id' => $rowId
            ]
        ]) ?>
</div>
<?php
ActiveForm::end() ?>