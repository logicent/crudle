<?php
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $generator yii\gii\generators\extension\Generator */

?>

<!-- <div class="module-form"> -->
    <div class="ui info message">
        Please read the
        <?= \yii\helpers\Html::a('Extension Guidelines', 'http://www.yiiframework.com/doc-2.0/guide-structure-extensions.html', ['target'=>'new']) ?>
        before creating an extension.
    </div>
    <!-- why is the spacing here not working as it should? -->
    <div class="ui hidden divider"></div>
    <div class="ui hidden divider"></div>
    <div class="ui hidden divider"></div>
<?php
    echo $form->field($generator, 'vendorName');
    echo $form->field($generator, 'packageName');
    echo $form->field($generator, 'namespace')->textInput(['placeholder' => 'crudle\main\\']);
    echo $form->field($generator, 'type')->dropDownList($generator->optsType());
    echo $form->field($generator, 'keywords');
    echo $form->field($generator, 'license')->dropDownList($generator->optsLicense(), ['prompt'=>'Choose...']);
    echo $form->field($generator, 'title');
    echo $form->field($generator, 'description');
    echo $form->field($generator, 'authorName');
    echo $form->field($generator, 'authorEmail');
    echo $form->field($generator, 'outputPath');
?>
<!-- </div> -->
