<?php

namespace crudle\app\setup\forms;

use crudle\app\main\enums\Type_Model;
use crudle\app\main\models\UploadForm;
use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class DataImportForm extends Model
{
    public $dataFile;
    // OR
    public $importFromGoogleSheets; // Must be a publicly accessible Google Sheets URL
    // public $status;
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
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [['dataFile'], 'file'],
            [['dataFile'], 'file', 'extensions' => ['csv', 'excel']],
            // [['targetTableName'], 'required'],
            [['createRecords', 'updateRecords'], 'boolean'],
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'dataFile' => Yii::t('app', 'Data file'),
            'createRecords' => Yii::t('app', 'Add new records'),
            'updateRecords' => Yii::t('app', 'Update existing records'),
        ]);
    }

    public function getListOptions()
    {
        return array_flip(Type_Model::modelClasses());
    }
}
