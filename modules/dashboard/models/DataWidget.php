<?php

namespace crudle\ext\dashboard\models;

use crudle\app\main\enums\Status_Active;
use crudle\app\crud\models\BaseActiveRecord;
use crudle\app\setup\enums\Permission_Group;
use crudle\app\setup\enums\Type_Permission;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "data_widget".
 */
class DataWidget extends BaseActiveRecord
{
    // id
    // label/name
    // description
    // displayHeader
    // cols = 4/8
    // rows
    // initialRange/defaultRange
    // valueRange
    // refreshInterval
    // decoratePrefix
    // decorateSuffix
    // type
    // options
    // Flush?
    // legend
    // legendAlign
    // scale

    public function init()
    {
        parent::init();
        $this->listSettings->listNameAttribute = 'title';
    }

    public static function tableName()
    {
        return '{{%Data_Widget}}';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [[
                'type',
                'title',
                'data_model',
                'data_aggregate_function',
                'group_by_column'
            ], 'required'],
            [[
                'data_aggregate_function',
                'group_by_column',
                'show_filtered_data',
                'column_width'
            ], 'string', 'max' => 140]
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'id'  => Yii::t('app', 'Name'),
            'type'  => Yii::t('app', 'Type'),
            'status'  => Yii::t('app', 'Inactive'),
            'data_model'    => Yii::t('app', 'Data model'),
            'data_aggregate_function'   => Yii::t('app', 'Data aggregate function'),
            'group_by_column'   => Yii::t('app', 'Group by column'),
            'show_filtered_data'    => Yii::t('app', 'Show filtered data'),
            'column_width'  => Yii::t('app', 'Column width'),
        ]);
    }

    // Workflow Interface
    public static function permissions()
    {
        return Type_Permission::enums(Permission_Group::Crud);
    }

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
