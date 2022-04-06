<?php

namespace app\modules\setup\models\base;

use app\modules\main\models\base\BaseActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

class BaseAppMenu extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'app_menu';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [[
                'icon',
                'icon_path',
                'icon_color',
                'route',
                // 'label',
                'group',
            ], 'string'],
            ['inactive', 'boolean'],
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            [
                'icon'      =>  Yii::t('app', 'Icon'),
                'icon_path'  =>  Yii::t('app', 'Icon path'),
                'icon_color' =>  Yii::t('app', 'Icon color'),
                'route'     =>  Yii::t('app', 'Route'),
                'title'     =>  Yii::t('app', 'Label'),
                'group'     =>  Yii::t('app', 'Group'),
                'status'   =>  Yii::t('app', 'Inactive'),
            ]
        ]);
    }

    public static function menuType()
    {

    }
}