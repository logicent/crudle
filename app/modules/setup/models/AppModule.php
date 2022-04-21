<?php

namespace crudle\setup\models;

use crudle\setup\enums\Status_Transaction;
use crudle\setup\enums\Type_Permission;
use crudle\main\models\base\BaseActiveRecord;
use crudle\setup\enums\Permission_Group;
use Yii;

/**
 * This is the model class for table "app_module".
 */
class AppModule extends BaseActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_module';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
        ];
    }

    // Workflow Interface
    public function hasWorkflow()
    {
        return false;
    }

    public static function permissions()
    {
        return Type_Permission::enums(Permission_Group::Crud);
    }

    public static function enums()
    {
        return [
            'status' => Status_Transaction::class
        ];
    }
}
