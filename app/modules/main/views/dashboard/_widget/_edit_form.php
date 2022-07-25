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

    <div class="ui small header" style="margin-top: 0em">
        <?= Yii::t('app', 'Edit row') ?>
    </div>

    <?= $this->render('@appMain/views/data_widget/field_inputs', [
            'model' => $model,
            'form' => $form,
            'rowId' => $rowId
        ]) ?>

    <?= Elements::button('Update row', [
            'class' => 'compact small update-row',
            'data'  => [
                'row-id' => $rowId
            ],
            // 'style' => 'margin-top: 0em'
        ]) ?>
<?php
ActiveForm::end() ?>
