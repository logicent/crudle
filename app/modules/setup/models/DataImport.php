<?php

namespace crudle\app\setup\models;

use crudle\app\main\enums\Type_Model_Id;
use crudle\app\main\models\base\BaseActiveRecord;
use crudle\app\main\models\UploadForm;
use crudle\app\setup\enums\Status_Transaction;
use crudle\app\setup\enums\Type_Permission;

/**
 * This is the model class for table "data_import".
 */
class DataImport extends BaseActiveRecord
{
    public function init()
    {
        parent::init();
        $this->listSettings->listNameAttribute = 'id';
    }

    public static function tableName()
    {
        return 'data_import';
    }

    // Workflow Interface
    public static function permissions()
    {
        return [Type_Permission::List => Type_Permission::List];
    }

    // ActiveRecord Interface
    public static function enums()
    {
        return [
            'status' => Status_Transaction::class
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
