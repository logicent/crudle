<?php

namespace crudle\app\setup\models;

use crudle\app\enums\Status_Active;
use crudle\app\main\models\base\BaseActiveRecord;
use crudle\app\setup\enums\Permission_Group;
use crudle\app\setup\enums\Type_Permission;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "app_dashboard_widget".
 */
class DashboardWidget extends BaseActiveRecord
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
        $this->listSettings = new ListViewSettingsForm();
        $this->listSettings->listNameAttribute = 'id';
    }

    public static function tableName()
    {
        return 'app_dashboard_widget';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [[
                'type',
                'data_model',
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
                'type'  => Yii::t('app', 'Type'),
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
}
