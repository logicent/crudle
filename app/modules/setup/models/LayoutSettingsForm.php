<?php

namespace app\modules\setup\models;

use app\modules\setup\models\base\BaseSettingsForm;
use Yii;

class LayoutSettingsForm extends BaseSettingsForm
{
    public $shortcutMenu;
    public $sidebarMenu;
    public $createMenu;
    public $alertMenu;
    public $helpMenu;
    public $userMenu;
    public $hideCreateMenu      = false;
    public $hideHelpMenu        = false;
    public $hideAlertMenu       = false;
    public $hideSearchbar       = false;
    public $hideWebsiteLink     = false;
    public $pinMainSidebar      = false;
    public $showHelpInfo        = false;
    public $allowUserPreference = true;
    public $bgImagePath         = null;
    public $bgImageStyles       = null;
    public $homeButtonIcon      = 'globe brown large';
    public $copyrightLabel      = null;
    // public $flashMessagePosition; // Top/Bottom:Left/Center/Right

    public function init()
    {
        $this->uploadForm = new \app\modules\main\models\UploadForm();
        $this->fileAttribute = 'bgImagePath';

        $this->shortcutMenu = new AppMenuForm();
        $this->sidebarMenu = new AppMenuForm();
        $this->createMenu = new AppMenuForm();
        $this->alertMenu = new AppMenuForm();
        $this->helpMenu = new AppMenuForm();
        $this->userMenu = new AppMenuForm();
    }

    public function rules()
    {
        return [
            [[
                'shortcutMenu',
                'sidebarMenu',
                'createMenu',
                'helpMenu',
                'alertMenu',
                'userMenu',
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
                'allowUserPreference'
                // 'flashMessagePosition'
            ], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'shortcutMenu'    =>  Yii::t('app', 'Shortcut menu'),
            'sidebarMenu'    =>  Yii::t('app', 'Sidebar menu'),
            'createMenu'    =>  Yii::t('app', 'Create menu'),
            'helpMenu'    =>  Yii::t('app', 'Help menu'),
            'alertMenu'    =>  Yii::t('app', 'Alert menu'),
            'userMenu'    =>  Yii::t('app', 'User menu'),
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
            'allowUserPreference'   =>  Yii::t('app', 'Allow user preferences'),
            // 'flashMessagePosition'    =>  Yii::t('app', 'Flash message position'),
        ];
    }
}
