<?php
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $generator yii\gii\generators\form\Generator */

echo $form->field($generator, 'modelClass')->textInput(['placeholder' => 'e.g. crudle\main\models\Todo']);
echo $form->field($generator, 'scenarioName');
echo $form->field($generator, 'viewName')->textInput(['placeholder' => 'e.g. main/index']);
echo $form->field($generator, 'viewPath');
echo $form->field($generator, 'enableI18N')->checkbox();
echo $form->field($generator, 'messageCategory');
