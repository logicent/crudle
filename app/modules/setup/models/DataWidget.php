<?php

namespace app\modules\setup\models;

use app\enums\Status_Active;
use app\modules\setup\models\base\BaseAppMenu;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "data_widget".
 */
class DataWidget extends BaseAppMenu
{
    public function init()
    {
        $this->listSettings = new ListViewSettingsForm();
        $this->listSettings->listNameAttribute = 'id'; // override in view index
    }

    public static function tableName()
    {
        return 'app_data_widget';
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
        return [
            'type'  => Yii::t('app', 'Type'),
            'data_model'    => Yii::t('app', 'Data model'),
            'data_aggregate_function'   => Yii::t('app', 'Data aggregate function'),
            'group_by_column'   => Yii::t('app', 'Group by column'),
            'show_filtered_data'    => Yii::t('app', 'Show filtered data'),
            'column_width'  => Yii::t('app', 'Column width'),
        ];
    }

    // ActiveRecord Interface
    public static function enums()
    {
        return [
            'status' => Status_Active::class,
        ];
    }
}
