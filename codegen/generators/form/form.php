<?php
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $generator crudle\kit\generators\form\Generator */
?>

<div class="ui attached padded segment">
    <div class="ui small header" style="font-weight: 500;">
        <?= Yii::t('app', 'Model') ?>
    </div>
    <div class="ui one column grid">
        <div class="column">
            <?= $form->field($generator, 'modelClass')->textInput(['placeholder' => 'e.g. crudle\main\models\Todo']) ?>
            <?= $form->field($generator, 'scenarioName') ?>
        </div>
    </div>
</div>
<div class="ui attached padded segment">
    <div class="ui small header" style="font-weight: 500;">
        <?= Yii::t('app', 'View') ?>
    </div>
    <div class="ui one column grid">
        <div class="column">
            <?= $form->field($generator, 'viewName')->textInput(['placeholder' => 'e.g. main/index']) ?>
            <?= $form->field($generator, 'viewPath') ?>
        </div>
    </div>
</div>
<div class="ui attached padded segment">
    <div class="ui small header" style="font-weight: 500;">
        <?= Yii::t('app', 'Translation') ?>
    </div>
    <div class="ui one column grid">
        <div class="eight wide column">
            <?= $form->field($generator, 'enableI18N')->checkbox() ?>
            <?= $form->field($generator, 'messageCategory') ?>
        </div>
    </div>
</div>
