<?php
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $generator crudle\kit\generators\controller\Generator */
?>

<div class="ui attached padded segment">
    <div class="ui small header" style="font-weight: 500;">
        <?= Yii::t('app', 'Controller') ?>
    </div>
    <div class="ui one column grid">
        <div class="column">
            <?= $form->field($generator, 'baseControllerClass')->textInput(['placeholder' => 'e.g. crudle\app\main\controllers\base\ViewController']) ?>
            <?= $form->field($generator, 'controllerClass')->textInput(['placeholder' => 'e.g. crudle\app\main\controllers\TodoController']) ?>
            <?= $form->field($generator, 'actions')->textInput(['placeholder' => 'e.g. index, create-todo']) ?>
            <?= $form->field($generator, 'viewPath')->textInput(['placeholder' => 'e.g. <parent_dir>/app/modules/main/views/todo -or- @appMain/views/todo']) ?>
        </div>
    </div>
</div>
