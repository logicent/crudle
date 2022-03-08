<?php

namespace app\modules\setup\models;

use app\modules\setup\models\base\BaseSettingsForm;
use Yii;

class LayoutSettingsForm extends BaseSettingsForm
{
    public $hideCreateMenu      = false;
    public $hideHelpMenu        = false;
    public $hideAlertMenu       = false;
    public $hideSearchbar       = false;
    public $hideWebsiteLink     = false;
    public $pinMainSidebar      = false;
    public $showHelpInfo        = false;
    public $bgImagePath         = null;
    public $bgImageStyles       = null;
    public $homeButtonIcon      = 'globe brown large';
    public $copyrightLabel      = null;
    // public $flashMessagePosition; // Top/Bottom:Left/Center/Right

    public function init()
    {
        $this->uploadForm = new \app\models\UploadForm();
        $this->fileAttribute = 'bgImagePath';
    }

    public function rules()
    {
        return [
            [[
                'hideCreateMenu',
                'hideHelpMenu',
                'hideAlertMenu',
                'hideSearchbar',
                'hideWebsiteLink',
                'pinMainSidebar',
                'showHelpInfo',
                'bgImagePath',
                'bgImageStyles',
                'homeButtonIcon',
                'copyrightLabel',
                // 'flashMessagePosition'
            ], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'hideCreateMenu'    =>  Yii::t('app', 'Hide create menu'),
            'hideHelpMenu'      =>  Yii::t('app', 'Hide help menu'),
            'hideAlertMenu'     =>  Yii::t('app', 'Hide alert menu'),
            'hideSearchbar'     =>  Yii::t('app', 'Hide search bar'),
            'hideWebsiteLink'   =>  Yii::t('app', 'Hide website link'),
            'showHelpInfo'      =>  Yii::t('app', 'Show help info'),
            'bgImagePath'       =>  Yii::t('app', 'Background image path'),
            'bgImageStyles'     =>  Yii::t('app', 'Background image styles'),
            'homeButtonIcon'    =>  Yii::t('app', 'Home button icon'),
            'pinMainSidebar'    =>  Yii::t('app', 'Pin main sidebar'),
            'copyrightLabel'    =>  Yii::t('app', 'Copyright label'),
            // 'flashMessagePosition'    =>  Yii::t('app', 'Flash message position'),
        ];
    }
}
