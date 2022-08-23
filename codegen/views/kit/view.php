<?php

use yii\helpers\Html;
use crudle\kit\components\ActiveField;
use crudle\kit\CodeFile;
use icms\FomanticUI\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $generator crudle\kit\Generator */
/* @var $id string panel ID */
/* @var $form yii\widgets\ActiveForm */
/* @var $results string */
/* @var $hasError bool */
/* @var $files CodeFile[] */
/* @var $selectedFiles array */

$title = $generator->getName() . ' Generate';
$this->title = Yii::t('app', '{title}', ['title' => $title]);
echo $this->render('_breadcrumb');

$templates = [];
foreach ($generator->templates as $name => $path) :
    $templates[$name] = "$name ($path)";
endforeach;
?>
<div class="ui secondary top attached padded segment">
    <div class="ui header" style="color: #36414c; font-weight: normal;">
        <?= Yii::t('app', '{description}', ['description' => $generator->getDescription()]) ?>
    </div>
</div>

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
    <?= $this->renderFile($generator->formView(), [
            'generator' => $generator,
            'form' => $form,
        ]) ?>
    <div class="ui attached padded segment">
        <?= $form
                ->field($generator, 'template')
                ->sticky()
                ->label(Yii::t('app', 'Code Template'))
                ->dropDownList($templates)
                ->hint(Yii::t('app', 'This is a set of code templates to be used to generate the specific code file(s).'))
            ?>
        <?= Html::submitButton(Yii::t('app', 'Generate'), ['name' => 'generateFiles', 'class' => 'ui basic primary button']) ?>
        <?php
            if (isset($files)) :
                echo Html::submitButton(Yii::t('app', 'Save File(s)'), ['name' => 'saveFiles', 'class' => 'ui primary button']);
            endif ?>
    </div>
    <div class="ui secondary bottom attached padded segment">
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
                    'selectedFiles' => $selectedFiles,
                ]);
        else :
            echo Html::tag('p',
                    Yii::t('app', 'Click on the <code>Generate</code> button above to preview the generated code file(s) here:'),
                    ['class' => 'text-muted']
                );
        endif ?>
    </div>
<?php
    ActiveForm::end() ?>