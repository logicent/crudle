<?php

namespace app\modules\setup\models\base;

use app\modules\setup\enums\Type_Menu_Group;
use app\modules\setup\enums\Type_Role;
use app\modules\setup\models\base\BaseSettingsForm;
use Yii;

class BaseMenuForm extends BaseSettingsForm
{
    public $icon;
    public $iconPath;
    public $iconColor;
    public $route;
    public $label;
    public $group = Type_Menu_Group::Core;
    public $visible = Type_Role::SystemManager;

    public function rules()
    {
        return [
            [[
                'icon',
                'iconPath',
                'iconColor',
                'route',
                'label',
                'group',
            ], 'string'],
            ['visible', 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'icon'      =>  Yii::t('app', 'Icon'),
            'iconPath'  =>  Yii::t('app', 'Icon path'),
            'iconColor' =>  Yii::t('app', 'Icon color'),
            'route'     =>  Yii::t('app', 'Route'),
            'label'     =>  Yii::t('app', 'Label'),
            'group'     =>  Yii::t('app', 'Group'),
            'visible'   =>  Yii::t('app', 'Visible'),
        ];
    }
}