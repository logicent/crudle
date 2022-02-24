<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;
use Zelenin\yii\SemanticUI\modules\Select;

$this->title = Yii::t('app', 'Print Settings');

$form = ActiveForm::begin([
        'id' => $model->formName(),
        'options' => [
            'autocomplete' => 'off',
            'class' => 'ui form ajax-submit',
        ],
    ]) ?>

    <?= $this->render('//_form/_modal_header', ['model' => $model]) ?>
    
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