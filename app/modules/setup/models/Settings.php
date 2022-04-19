<?php

namespace crudle\setup\models;

use crudle\main\models\base\BaseActiveRecord;
use Yii;
use yii\helpers\StringHelper;

class Settings extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'settings';
    }

    public static function primaryKey()
    {
        return ['model_name', 'attribute_name'];
    }

    public function rules()
    {
        return [
            [['model_name', 'attribute_name'], 'required'],
            [['description', 'attribute_value', 'validation_rule', 'type', 'comments'], 'string'],
            ['hidden', 'boolean'],
            [['model_name', 'attribute_name', 'default_value', 'form_title', 
                'attribute_label'], 'string', 'max' => 140],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'string', 'max' => 140],
        ];
    }

    public function attributeLabels()
    {
        return [
            'model_name' => Yii::t('app', 'Model name'),
            'attribute_name' => Yii::t('app', 'Attribute name'),
            'attribute_value' => Yii::t('app', 'Attribute value'),
            'attribute_label' => Yii::t('app', 'Attribute label'),
            'validation_rule' => Yii::t('app', 'Validation rule'),
            'default_value' => Yii::t('app', 'Default value'),
            'form_title' => Yii::t('app', 'Form title'),
            'description' => Yii::t('app', 'Description'),
            'hidden' => Yii::t('app', 'Hidden'),
            'type' => Yii::t('app', 'Type'),
            'created_at' => Yii::t('app', 'Created at'),
            'created_ay' => Yii::t('app', 'Created by'),
            'updated_at' => Yii::t('app', 'Updated at'),
            'updated_by' => Yii::t('app', 'Updated by'),
            'comments' => Yii::t('app', 'Comments'),
        ];
    }

    public static function getSettings( $modelClass )
    {
        $model = new $modelClass();
        $modelClassname = StringHelper::basename( $modelClass );

        $settings = self::find()->where(['model_name' => $modelClassname])
                                ->asArray()
                                ->all();
        if (empty( $settings ))
            return $model;

        $model->populateAttributes( $settings );

        return $model;
    }

}
