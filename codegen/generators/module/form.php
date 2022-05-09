<?php
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $generator crudle\kit\generators\module\Generator */

?>

<div class="ui attached padded segment">
    <div class="ui small header" style="font-weight: 500;">
        <?= Yii::t('app', 'Module') ?>
    </div>
    <div class="ui two column grid">
        <div class="column">
            <?= $form->field($generator, 'moduleID')->textInput(['placeholder' => 'e.g. main']) ?>
            <?= $form->field($generator, 'moduleClass')->textInput(['placeholder' => 'e.g. crudle\app\main\Module']) ?>
        </div>
    </div>
</div>
