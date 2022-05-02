<?php
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $generator crudle\kit\generators\controller\Generator */

echo $form->field($generator, 'baseClass');
echo $form->field($generator, 'controllerClass')->textInput(['placeholder' => 'e.g. crudle\main\controllers\TodoController']);
echo $form->field($generator, 'actions');
echo $form->field($generator, 'viewPath')->textInput(['placeholder' => 'e.g. /home/logicent/yii2-crudle/controllers/views/todo -or- @app_main/views/todo']);
