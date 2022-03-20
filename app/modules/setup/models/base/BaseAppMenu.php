<?php

namespace app\modules\setup\models\base;

use app\models\base\BaseActiveRecord;
use Yii;

class BaseAppMenu extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'app_menu';
    }

    public function rules()
    {
        return [
            [[
                'icon',
                'icon_path',
                'icon_color',
                'route',
                'label',
                'group',
            ], 'string'],
            ['inactive', 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'icon'      =>  Yii::t('app', 'Icon'),
            'icon_path'  =>  Yii::t('app', 'Icon path'),
            'icon_color' =>  Yii::t('app', 'Icon color'),
            'route'     =>  Yii::t('app', 'Route'),
            'label'     =>  Yii::t('app', 'Label'),
            'group'     =>  Yii::t('app', 'Group'),
            'inactive'   =>  Yii::t('app', 'Inactive'),
        ];
    }

    public static function menuType()
    {

    }
}