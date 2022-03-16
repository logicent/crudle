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