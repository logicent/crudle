<?php

namespace crudle\setup\models\base;

use Yii;
use yii\helpers\ArrayHelper;

class BaseMenu extends BaseSettingsForm
{
    public $icon;
    public $iconPath;
    public $iconColor;
    public $route; // url
    public $label;
    public $openInNewTab = false;
    public $parentLabel = null;
    public $alignRight = false;
    public $inactive = false;
    public $type; // menu type

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
                'parentLabel' => Yii::t('app', 'Parent label'),
                'openInNewTab' => Yii::t('app', 'Open URL in a new tab'),
                'alignRight' => Yii::t('app', 'Align right'),
                'inactive'   =>  Yii::t('app', 'Inactive'),
            ]);
    }
}