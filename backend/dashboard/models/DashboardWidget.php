<?php

namespace crudle\app\dashboard\models;

use crudle\app\crud\enums\Type_Relation;
use crudle\app\crud\models\ActiveRecordDetail;
use crudle\app\user\enums\Permission_Group;
use crudle\app\user\enums\Type_Permission;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "dashboard_widget".
 */
class DashboardWidget extends ActiveRecordDetail
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

    public static function tableName()
    {
        return '{{%Dashboard_Widget}}';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [[
                'column_width',
                'type'
            ], 'required'],
            [[
                'data_aggregate_function',
                'group_by_column',
                'show_filtered_data',
                'column_width'
            ], 'string', 'max' => 140 ]
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
                'dashboard_id'  => Yii::t('app', 'Dashboard'),
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

    // ActiveRecord Interface
    public static function enums()
    {
        return [
            'status' => Status_Active::class,
        ];
    }

    public static function relations()
    {
        return [
            'dashboard'   => [
                'class' => Dashboard::class,
                'type' => Type_Relation::ParentModel
            ],
        ];
    }

    public function getDashboard()
    {
        return $this->hasOne(Dashboard::class, ['id' => 'dashboard_id']);
    }

    public static function foreignKeyAttribute()
    {
        return 'dashboard_id';
    }
}
