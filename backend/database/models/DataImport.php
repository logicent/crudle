<?php

namespace crudle\app\database\models;

use crudle\app\crud\enums\Type_Model_Id;
use crudle\app\crud\models\BaseActiveRecord;
use crudle\app\main\forms\UploadForm;
use crudle\app\user\enums\Permission_Group;
use crudle\app\user\enums\Type_Permission;
use crudle\app\workflow\enums\Status_Transaction;

/**
 * This is the model class for table "data_import".
 */
class DataImport extends BaseActiveRecord
{
    public function init()
    {
        parent::init();
        $this->listSettings->listNameAttribute = 'id';

        $this->uploadForm = new UploadForm();
        $this->fileAttribute = 'import_file';
    }

    public static function tableName()
    {
        return '{{%Data_Import}}';
    }

    // Workflow Interface
    public static function permissions()
    {
        return Type_Permission::enums(Permission_Group::Crud);
    }

    // ActiveRecord Interface
    public static function enums()
    {
        return [
            'status' => [
                'class' => Status_Transaction::class,
                'attribute' => 'status'
            ]
        ];
    }

    public static function autoSuggestIdValue()
    {
        return true;
    }

    public static function autoSuggestIdType()
    {
        return Type_Model_Id::GeneratedUuid;
    }

    // public static function relations()
    // {
    //     return [
    //     ];
    // }
}
