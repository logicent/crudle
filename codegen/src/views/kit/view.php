<?php

use yii\helpers\Html;
use crudle\kit\components\ActiveField;
use crudle\kit\CodeFile;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $generator yii\gii\Generator */
/* @var $id string panel ID */
/* @var $form yii\widgets\ActiveForm */
/* @var $results string */
/* @var $hasError bool */
/* @var $files CodeFile[] */
/* @var $answers array */

$this->title = $generator->getName();
$templates = [];
foreach ($generator->templates as $name => $path) :
    $templates[$name] = "$name ($path)";
endforeach;
?>
<div class="ui top attached padded segment">
    <div class="ui header" style="font-weight: normal;"><?= $generator->getDescription() ?></div>
<?php
    $hintOptions = [
        'tag' => 'div',
        'class' => 'text-muted',
        'style' => 'font-size: 0.95em; padding-left: 0.25em'
    ];
    $form = ActiveForm::begin([
        'id' => "$id-generator",
        'successCssClass' => '',
        'fieldConfig' => ['class' => ActiveField::class, 'hintOptions' => $hintOptions],
    ]) ?>
    <div class="ui column grid">
        <div class="column" id="form-fields">
            <?= $this->renderFile($generator->formView(), [
                    'generator' => $generator,
                    'form' => $form,
                ]) ?>
            <br>
            <?= $form
                    ->field($generator, 'template')->sticky()
                    ->label('Code Template')
                    ->dropDownList($templates)->hint('
                        Please select which set of the templates should be used to generated the code.')
                ?>
        </div>
    </div>
    <div class="ui column grid">
        <div class="column">
            <?= Html::submitButton('Preview', ['name' => 'preview', 'class' => 'ui primary button']) ?>
            <?php
                if (isset($files)):
                    echo Html::submitButton('Generate', ['name' => 'generate', 'class' => 'ui success button']);
                endif ?>
        </div>
    </div>
</div>
<div class="ui bottom attached padded segment">
    <?php
        if (isset($results)) :
            echo $this->render('view/results', [
                    'generator' => $generator,
                    'results' => $results,
                    'hasError' => $hasError,
                ]);
        elseif (isset($files)) :
            echo $this->render('view/files', [
                    'id' => $id,
                    'generator' => $generator,
                    'files' => $files,
                    'answers' => $answers,
                ]);
        endif;
    ActiveForm::end() ?>
</div>
