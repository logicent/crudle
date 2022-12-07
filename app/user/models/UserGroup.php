<?php

namespace crudle\app\user\models;

use crudle\app\main\enums\Status_Active;
use crudle\app\crud\models\BaseActiveRecord;
use crudle\app\user\enums\Permission_Group;
use crudle\app\user\enums\Type_Permission;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user_group".
 */
class UserGroup extends BaseActiveRecord
{
    public function init()
    {
        parent::init();
        $this->listSettings->listNameAttribute = 'id';
    }

    public static function tableName()
    {
        return '{{%User_Group}}';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge([
            ['id', 'default', 'value' => null]
        ], $rules);
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Group name'),
            // 'status' => Yii::t('app', 'Inactive'),
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
                'attribute' => 'status'
            ]
        ];
    }

    public static function autoSuggestIdValue()
    {
        return false;
    }
}
