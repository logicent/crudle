<?php

namespace app\modules\tool\models;

use app\enums\Status_Transaction;
use app\models\base\BaseActiveRecord;
use app\modules\setup\models\ListViewSettingsForm;
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
