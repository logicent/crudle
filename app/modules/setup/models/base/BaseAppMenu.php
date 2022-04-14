<?php

namespace app\modules\setup\models\base;

use Yii;
use yii\helpers\ArrayHelper;

class BaseAppMenu extends BaseSettingsForm
{
    public $icon;
    public $iconPath;
    public $iconColor;
    public $route;
    public $label;
    public $group;
    public $inactive;
    public $type;

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [[
                'route',
                'label',
            ], 'required'],
            [[
                'icon',
                'iconPath',
                'iconColor',
                'route',
                'label',
                'group',
            ], 'string'],
            ['inactive', 'boolean'],
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return
            ArrayHelper::merge($attributeLabels, [
                'icon'      =>  Yii::t('app', 'Icon'),
                'iconPath'  =>  Yii::t('app', 'Icon path'),
                'iconColor' =>  Yii::t('app', 'Icon color'),
                'route'     =>  Yii::t('app', 'Route'),
                'label'     =>  Yii::t('app', 'Label'),
                'group'     =>  Yii::t('app', 'Group'),
                'inactive'   =>  Yii::t('app', 'Inactive'),
            ]);
    }
}