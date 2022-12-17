<?php

namespace crudle\app\printing\forms;

use crudle\app\upload\forms\UploadForm;
use crudle\app\setup\models\base\BaseSettingsForm;
use Yii;

class PrintSettingsForm extends BaseSettingsForm
{
    // PDF Settings
    public $sendPrintAsPdf = true; // recommended
    public $repeatHeaderAndFooterInPdf = true;
    public $PdfPageSize = 'A4';
    // Page Settings
    public $printWithLetterHead = true;
    public $compactItemPrint = false;
    public $printUomAfterQuantity = false;
    public $allowPrintForDraft  = true;
    public $alwaysAddDraftHeadingForPrintingDraftDocuments  = true;
    public $allowPageBreakInsideTables = false;
    public $allowPrintForCancelled = false;
    public $printTaxesWithZeroAmount = false;
    public $enableRawPrinting = false;
    // Print Style
    // public $printStyle; // Classic, Modern, Monochrome, Custom
    // Fonts
    public $font;
    public $fontSize;

    public function init()
    {
        $this->uploadForm = new UploadForm();
        $this->fileAttribute = 'bgImagePath';
    }

    public function rules()
    {
        return [
            [[
                'sendPrintAsPdf',
                'repeatHeaderAndFooterInPdf',
                'PdfPageSize',
                'Settings',
                'printWithLetterHead',
                'compactItemPrint',
                'printUomAfterQuantity',
                'allowPrintForDraft',
                'alwaysAddDraftHeadingForPrintingDraftDocuments',
                'allowPageBreakInsideTables',
                'allowPrintForCancelled',
                'printTaxesWithZeroAmount',
                'enableRawPrinting',
                'Style',
                'font',
                'fontSize',
            ], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'sendPrintAsPdf'   =>  Yii::t('app', 'Send print as PDF'),
            'repeatHeaderAndFooterInPdf'   =>  Yii::t('app', 'Repeat header and footer in PDF'),
            'PdfPageSize'   =>  Yii::t('app', 'PDF page size'),
            'printWithLetterHead' =>  Yii::t('app', 'Print with letterhead'),
            'compactItemPrint' =>  Yii::t('app', 'Compact item print'),
            'printUomAfterQuantity' =>  Yii::t('app', 'Print Uom after quantity'),
            'allowPrintForDraft' =>  Yii::t('app', 'Allow print for Draft'),
            'alwaysAddDraftHeadingForPrintingDraftDocuments' =>  Yii::t('app', 'Always add draft heading for printing draft documents'),
            'allowPageBreakInsideTables' =>  Yii::t('app', 'Allow page break inside tables'),
            'allowPrintForCancelled' =>  Yii::t('app', 'Allow print for cancelled'),
            'printTaxesWithZeroAmount' =>  Yii::t('app', 'Print taxes with zero amount'),
            'enableRawPrinting' =>  Yii::t('app', 'Enable raw printing'),
            'font' =>  Yii::t('app', 'Font'),
            'fontSize' =>  Yii::t('app', 'Font size'),
        ];
    }
}
