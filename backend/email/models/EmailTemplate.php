<?php

namespace crudle\app\email\models;

use crudle\app\main\enums\Status_Active;
use crudle\app\crud\models\BaseActiveRecord;
use crudle\app\user\enums\Permission_Group;
use crudle\app\user\enums\Type_Permission;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "email_template".
 */
class EmailTemplate extends BaseActiveRecord
{
    public static function tableName()
    {
        return '{{%Email_Template}}';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge([
        ], $rules);
    }

    public function attributeLabels()
    {
        return [
        ];
    }

    public static function permissions()
    {
        return array_merge(
            Type_Permission::enums(Permission_Group::Crud),
            Type_Permission::enums(Permission_Group::Data),
        );
    }

    // ActiveRecord Interface
    public static function enums()
    {
        return [
            'status' => [
                'class' => Status_Active::class,
                'attribute' => 'inactive'
            ],
        ];
    }

    public static function autoSuggestIdValue()
    {
        return false;
    }
}
