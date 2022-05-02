<?php
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $generator crudle\kit\generators\module\Generator */

?>
<div class="module-form">
<?php
    echo $form->field($generator, 'moduleID')->textInput(['placeholder' => 'e.g. main']);
    echo $form->field($generator, 'moduleClass')->textInput(['placeholder' => 'e.g. crudle\main\Module']);
?>
</div>
