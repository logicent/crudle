<?php

namespace crudle\ext\web_cms\models;

use crudle\app\crud\models\ActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

class SidebarMenu extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%Site_Sidebar}}';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [[
                'route', 'parent_label', 'icon'
            ], 'string'],
            ['inactive', 'boolean'],
            ['id', 'required'],
        ]);
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Label'),
            'route' => Yii::t('app', 'Route'),
            'parent_label' => Yii::t('app', 'Parent label'),
            'icon' => Yii::t('app', 'Icon'),
            'inactive' => Yii::t('app', 'Inactive'),
        ];
    }

    public static function enums()
    {
        return [
            'status' => [
                'class' => Status_Active::class,
                'attribute' => 'inactive'
            ]
        ];
    }
}
