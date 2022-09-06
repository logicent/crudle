<?php

namespace crudle\app\setup\models;

use crudle\app\main\enums\Type_Model_Id;
use crudle\app\main\models\base\BaseActiveRecord;
use crudle\app\main\models\UploadForm;
use crudle\app\setup\enums\Permission_Group;
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
