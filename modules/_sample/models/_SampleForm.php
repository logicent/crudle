<?php

namespace _sample\models;

use crudle\main\enums\Type_Relation;
use crudle\main\models\UploadForm;
use crudle\setup\models\base\BaseSettingsForm;
use Yii;

class _SampleForm extends BaseSettingsForm
{
    public function init()
    {
        $this->uploadForm = new UploadForm();
        $this->fileAttribute = 'fileAttribute';
    }

    public function rules()
    {
        return [
        ];
    }

    public function attributeLabels()
    {
        return [
            'attribute' => Yii::t('app', 'Attribute'),
        ];
    }

    public function attributeHints()
    {
        return [
            'attribute' => Yii::t('app', "Attribute"),
        ];
    }

    public static function relations(): array
    {
        return [
            'relationAttribute' => [
                'class' => RelationModel::class,
                'type' => Type_Relation::InlineModel,
            ],
        ];
    }

    public static function hasMixedValueFields(): bool
    {
        return true;
    }

    public static function mixedValueFields(): array
    {
        return [
            // Type_Mixed_Value::JsonFormatted => [
                'mixedAttribute',
            // ]
        ];
    }
}
