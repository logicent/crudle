<?php

namespace logicent\cms\models;

use crudle\main\models\base\BaseActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

class SidebarMenu extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'site_sidebar';
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
}
