<?php

namespace crudle\setup\models;

use crudle\setup\enums\Status_Transaction;
use crudle\main\models\base\BaseActiveRecord;
use crudle\setup\enums\Permission_Group;
use crudle\setup\enums\Type_Permission;
use crudle\setup\models\ListViewSettingsForm;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "print_style".
 */
class PrintStyle extends BaseActiveRecord
{
    public function init()
    {
        $this->listSettings = new ListViewSettingsForm();
        $this->listSettings->listNameAttribute = 'id'; // override in view index
    }

    public static function tableName()
    {
        return 'print_style';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge([
            [['id'], 'required'],
            [['id'], 'string', 'max' => 140],
            [['inactive', 'standard'], 'boolean'],
            [['css', 'preview'], 'string'],
            [['status'], 'default', 'value' => Status_Transaction::Draft],
        ], $rules);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'id' => Yii::t('app', 'Name'),
            'inactive' => Yii::t('app', 'Inactive'),
            'standard' => Yii::t('app', 'Standard'),
            'css' => Yii::t('app', 'CSS'),
            'preview' => Yii::t('app', 'Preview'),
        ]);
    }

    public static function permissions()
    {
        return array_merge(
            Type_Permission::enums(Permission_Group::Crud),
            Type_Permission::enums(Permission_Group::Data),
        );
    }

    public static function enums()
    {
        return [
            'status' => Status_Transaction::class
        ];
    }

    public static function autoSuggestIdValue()
    {
        return false;
    }

    public static function relations()
    {
        return [
        ];
    }

    public static function mixedValueFields()
    {
        return [
        ];
    }

    public function beforeSave($insert)
    {
        if (! parent::beforeSave($insert))
            return false;

        return true;
    }

    public function afterFind()
    {
        return parent::afterFind();
    }
}
