<?php

namespace app\modules\setup\models;

use app\modules\setup\enums\Status_Transaction;
use app\modules\main\models\base\BaseActiveRecord;
use app\modules\setup\enums\Permission_Group;
use app\modules\setup\enums\Type_Permission;
use app\modules\setup\models\ListViewSettingsForm;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "print_format".
 */
class PrintFormat extends BaseActiveRecord
{
    public function init()
    {
        $this->listSettings = new ListViewSettingsForm();
        $this->listSettings->listNameAttribute = 'id'; // override in view index
    }

    public static function tableName()
    {
        return 'print_format';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge([
            [['id'], 'required'], // name
            [['id', 'model_name', 'module', 'default_print_language'], 'string', 'max' => 140],
            [['inactive', 'custom_format'], 'boolean'],
            ['font', 'safe'],
            // Align Labels to the Right
            // Show Section Headings
            // Show Line Breaks after Sections
            // Show Absolute Values
            // If checked, negative numeric values of Currency, Quantity or Count would be shown as positive
            [['custom_css'], 'string'],
        ], $rules);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'id' => Yii::t('app', 'Name'),
            'model_name' => Yii::t('app', 'Model name'),
            'module' => Yii::t('app', 'Module'),
            'default_print_language' => Yii::t('app', 'Default print language'),
            'inactive' => Yii::t('app', 'Hidden'),
            'custom_format' => Yii::t('app', 'Custom format'),
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
