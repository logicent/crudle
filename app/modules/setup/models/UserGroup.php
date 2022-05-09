<?php

namespace crudle\app\setup\models;

use crudle\app\enums\Status_Active;
use crudle\app\main\models\base\BaseActiveRecord;
use crudle\app\setup\enums\Permission_Group;
use crudle\app\setup\enums\Type_Permission;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user_group".
 */
class UserGroup extends BaseActiveRecord
{
    public function init()
    {
        $this->listSettings = new ListViewSettingsForm();
        $this->listSettings->listNameAttribute = 'id';
    }

    public static function tableName()
    {
        return 'user_group';
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
            'status' => Status_Active::class,
        ];
    }

    public static function autoSuggestIdValue()
    {
        return false;
    }
}
