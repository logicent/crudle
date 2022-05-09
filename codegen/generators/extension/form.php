<?php
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $generator crudle\kit\generators\extension\Generator */

?>

<div class="ui attached padded segment">
    <div class="ui info message" style="position: unset !important">
        Please read the
        <?= \yii\helpers\Html::a('Extension Guidelines', 'http://www.yiiframework.com/doc-2.0/guide-structure-extensions.html', ['target' => 'new']) ?>
        before creating an extension.
    </div>
<?php
    echo $form->field($generator, 'vendorName');
    echo $form->field($generator, 'packageName');
    echo $form->field($generator, 'namespace')->textInput(['placeholder' => 'crudle\app\main\\']);
    echo $form->field($generator, 'type')->dropDownList($generator->optsType());
    echo $form->field($generator, 'keywords');
    echo $form->field($generator, 'license')->dropDownList($generator->optsLicense(), ['prompt'=>'Choose...']);
    echo $form->field($generator, 'title');
    echo $form->field($generator, 'description');
    echo $form->field($generator, 'authorName');
    echo $form->field($generator, 'authorEmail');
    echo $form->field($generator, 'outputPath');
?>
</div>
