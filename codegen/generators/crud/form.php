<?php
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $generator crudle\kit\generators\crud\Generator */
?>

<div class="ui attached padded segment">
    <div class="ui small header" style="font-weight: 500;">
        <?= Yii::t('app', 'Models') ?>
    </div>
    <div class="ui one column grid">
        <div class="column">
            <?= $form->field($generator, 'modelClass')->textInput(['placeholder' => 'e.g. crudle\app\main\models\Todo']) ?>
            <?= $form->field($generator, 'searchModelClass')->textInput(['placeholder' => 'e.g. crudle\app\main\models\search\TodoSearch']) ?>
        </div>
    </div>
</div>
<div class="ui attached padded segment">
    <div class="ui small header" style="font-weight: 500;">
        <?= Yii::t('app', 'Controllers') ?>
    </div>
    <div class="ui one column grid">
        <div class="column">
            <?= $form->field($generator, 'baseControllerClass') ?>
            <?= $form->field($generator, 'controllerClass')->textInput(['placeholder' => 'e.g. crudle\app\main\controllers\TodoController']) ?>
        </div>
    </div>
</div>
<div class="ui attached padded segment">
    <div class="ui small header" style="font-weight: 500;">
        <?= Yii::t('app', 'Views') ?>
    </div>
    <?= $form->field($generator, 'viewPath')->textInput(['placeholder' => 'e.g. <parent_dir>/app/modules/main/views/todo -or- @appMain/views/todo']) ?>
    <div class="ui two column grid">
        <div class="column">
            <?= $form->field($generator, 'enablePjax')->checkbox() ?>
            <?= $form->field($generator, 'indexWidgetType')->dropDownList([
                    'grid' => 'GridView',
                    'list' => 'ListView',
                ]) ?>
        </div>
        <div class="column">
            <?= $form->field($generator, 'enableI18N')->checkbox() ?>
            <?= $form->field($generator, 'messageCategory') ?>
        </div>
    </div>
</div>