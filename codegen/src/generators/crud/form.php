<?php
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $generator yii\gii\generators\crud\Generator */

echo $form->field($generator, 'modelClass')->textInput(['placeholder' => 'e.g. crudle\main\models\Todo']);
echo $form->field($generator, 'searchModelClass')->textInput(['placeholder' => 'e.g. crudle\main\models\TodoSearch']);
echo $form->field($generator, 'baseControllerClass');
echo $form->field($generator, 'controllerClass')->textInput(['placeholder' => 'e.g. crudle\main\controllers\TodoController']);
echo $form->field($generator, 'viewPath')->textInput(['placeholder' => 'e.g. /home/logicent/yii2-crudle/app/modules/main/controllers/views/todo -or- @app_main/views/todo']);
echo $form->field($generator, 'indexWidgetType')->dropDownList([
    'grid' => 'GridView',
    'list' => 'ListView',
]);
echo $form->field($generator, 'enableI18N')->checkbox();
echo $form->field($generator, 'enablePjax')->checkbox();
echo $form->field($generator, 'messageCategory');
