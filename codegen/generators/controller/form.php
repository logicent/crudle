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
            <?= $form->field($generator, 'baseClass')->textInput(['placeholder' => 'e.g. crudle\main\controllers\base\BaseViewController']) ?>
            <?= $form->field($generator, 'controllerClass')->textInput(['placeholder' => 'e.g. crudle\main\controllers\TodoController']) ?>
            <?= $form->field($generator, 'actions')->textInput(['placeholder' => 'e.g. index, create-todo']) ?>
            <?= $form->field($generator, 'viewPath')->textInput(['placeholder' => 'e.g. /home/logicent/yii2-crudle/controllers/views/todo -or- @app_main/views/todo']) ?>
        </div>
    </div>
</div>
