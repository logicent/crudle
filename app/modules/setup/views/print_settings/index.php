<?php

use Zelenin\yii\SemanticUI\widgets\ActiveForm;

$this->title = Yii::t('app', 'Print Settings');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Setup'), 'url' => ['/setup']];

$form = ActiveForm::begin([
        'id' => $model->formName(),
        'options' => [
            'autocomplete' => 'off',
            'class' => 'ui form ajax-submit',
        ],
    ]) ?>

    <div class="ui attached padded segment">
        <?= $form->field($model, 'sendPrintAsPdf')->checkbox() ?>
        <?= $form->field($model, 'repeatHeaderAndFooterInPdf')->checkbox() ?>
        <div class="two fields">
            <?= $form->field($model, 'PdfPageSize')->textInput() ?>
        </div>
        <?= $form->field($model, 'printWithLetterHead')->checkbox() ?>
        <?= $form->field($model, 'compactItemPrint')->checkbox() ?>
        <?= $form->field($model, 'printUomAfterQuantity')->checkbox() ?>
        <?= $form->field($model, 'allowPrintForDraft')->checkbox() ?>
        <?= $form->field($model, 'alwaysAddDraftHeadingForPrintingDraftDocuments')->checkbox() ?>
        <?= $form->field($model, 'allowPageBreakInsideTables')->checkbox() ?>
        <?= $form->field($model, 'allowPrintForCancelled')->checkbox() ?>
        <?= $form->field($model, 'printTaxesWithZeroAmount')->checkbox() ?>
        <?= $form->field($model, 'enableRawPrinting')->checkbox() ?>
        <div class="two fields">
            <?= $form->field($model, 'font')->dropDownList([]) ?>
            <?= $form->field($model, 'fontSize')->dropDownList([]) ?>
        </div>
    </div>
<?php 
ActiveForm::end();
$this->registerJs($this->render('//_form/_submit.js'));

$this->registerJs(<<<JS

JS);
