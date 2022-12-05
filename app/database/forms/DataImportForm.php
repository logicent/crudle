<?php

namespace crudle\app\setup\forms;

use crudle\app\main\enums\Type_Model;
use crudle\app\upload\forms\UploadForm;
use crudle\app\setup\models\DataImport;
use Yii;
use yii\helpers\ArrayHelper;

class DataImportForm extends DataImport
{
    public $importFromGoogleSheets; // Must be a publicly accessible Google Sheets URL
    // public $dataModel;
    // public $childDataModels;
    // public $dataModelAttributes;
    // public $childDataModelAttributes;
    public $exportType;
    public $fileType;
    // public $doNotSendEmails = true;
    public $createRecords = true;
    public $updateRecords = false;
    public $uploadForm;
    // Import File Errors and Warnings
    // Preview in non-editable grid, allow alternate column mapping and show warnings
    // Import Log
    // public $showFailedLogs {RowNumber, Status, Message}

    public function init()
    {
        $this->uploadForm = new UploadForm();
        $this->fileAttribute = 'import_file';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [['import_file'], 'file'],
            [['import_file'], 'file', 'extensions' => ['csv', 'excel']],
            [['model_name'], 'required'],
            [['createRecords', 'updateRecords'], 'boolean'],
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'import_file' => Yii::t('app', 'Data file'),
            'createRecords' => Yii::t('app', 'Add new records'),
            'updateRecords' => Yii::t('app', 'Update existing records'),
        ]);
    }
}
