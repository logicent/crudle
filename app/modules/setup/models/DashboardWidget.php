<?php

namespace crudle\app\setup\models;

use crudle\app\main\enums\Type_Relation;
use crudle\app\main\models\base\BaseActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "dashboard_widget".
 */
class DashboardWidget extends DataWidget
{
    public static function tableName()
    {
        return 'dashboard_widget';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [[
                'dashboard_id',
            ], 'required'],
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
                'dashboard_id'  => Yii::t('app', 'Dashboard'),
        ]);
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
}
