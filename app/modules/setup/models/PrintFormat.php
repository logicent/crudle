<?php

namespace app\modules\setup\models;

use app\enums\Status_Active;
use app\enums\Status_Transaction;
use app\enums\Type_Relation;
use app\models\base\BaseActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

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
