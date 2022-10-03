<?php

namespace crudle\app\setup\models;

use crudle\app\main\enums\Type_Mixed_Value;
use crudle\app\main\enums\Type_Relation;
use crudle\app\main\models\UploadForm;
use crudle\app\setup\models\base\BaseSettingsForm;
use Yii;

class LayoutSettingsForm extends BaseSettingsForm
{
    public $appShortcutMenu;
    public $appCreateMenu;
    public $appAlertMenu;
    public $appHelpMenu;
    // public $appSidebarMenu;
    // public $appUserMenu;
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

    // public $hideBreadcrumbs = false;
    // public $userNavTemplate = '{createMenu},{searchInput},{helpMenu}';
    // public $hideMainSidebar = false;
    // public $mainSidebarView = MainSidebar::Collapsed/MainSidebar::Expanded // (stretched);
    // public $mainSidebarShowStatLabel = false;
    // public $mainSidebarShowIconsOnly; // (if collapsed)

    public function init()
    {
        $this->uploadForm = new UploadForm();
        $this->fileAttribute = 'bgImagePath';

        $this->appShortcutMenu = new AppShortcutMenu();
        $this->appCreateMenu = new AppCreateMenu();
        $this->appAlertMenu = new AppAlertMenu();
        $this->appHelpMenu = new AppHelpMenu();
        // $this->appUserMenu = new AppUserMenu();
        // $this->appSidebarMenu = new AppSidebarMenu();
    }

    public function rules()
    {
        return [
            // [[
            //     'appShortcutMenu',
            //     'appSidebarMenu',
            //     'appCreateMenu',
            //     'appAlertMenu',
            // //     'appHelpMenu',
            // //     'appUserMenu',
            // ], 'string'], // To-Do: use JSONValidator and/or model Object validator
            [[
                'homeButtonIcon',
                'copyrightLabel',
                'bgImagePath',
                'bgImageStyles',
                // 'flashMessagePosition'
            ], 'string'],
            [[
                'pinMainSidebar',
                'hideCreateMenu',
                'hideHelpMenu',
                'hideAlertMenu',
                'hideSearchbar',
                'hideWebsiteLink',
                'showHelpInfo',
                'allowUserPreference',
            ], 'boolean']
        ];
    }

    public function attributeLabels()
    {
        return [
            'appShortcutMenu'    =>  Yii::t('app', 'Shortcut menu'),
            'appSidebarMenu'    =>  Yii::t('app', 'Sidebar menu'),
            'appCreateMenu'    =>  Yii::t('app', 'Create menu'),
            'appHelpMenu'    =>  Yii::t('app', 'Help menu'),
            'appAlertMenu'    =>  Yii::t('app', 'Alert menu'),
            'appUserMenu'    =>  Yii::t('app', 'User menu'),
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

    public static function relations(): array
    {
        return [
            'appCreateMenu' => [
                'class' => AppCreateMenu::class,
                'type' => Type_Relation::InlineModel,
            ],
            'appHelpMenu' => [
                'class' => AppHelpMenu::class,
                'type' => Type_Relation::InlineModel,
            ],
            // 'appUserMenu' => [
            //     'class' => AppUserMenu::class,
            //     'type' => Type_Relation::InlineModel,
            // ],
            'appAlertMenu' => [
                'class' => AppAlertMenu::class,
                'type' => Type_Relation::InlineModel,
            ],
            // 'appSidebarMenu' => [
            //     'class' => AppSidebarMenu::class,
            //     'type' => Type_Relation::InlineModel,
            // ],
            'appShortcutMenu' => [
                'class' => AppShortcutMenu::class,
                'type' => Type_Relation::InlineModel,
            ],
        ];
    }

    public static function hasMixedValueFields(): bool
    {
        return true;
    }

    public static function mixedValueFields(): array
    {
        return [
            // Type_Mixed_Value::JsonFormatted => [
                'appShortcutMenu',
                'appCreateMenu',
                'appAlertMenu',
                'appHelpMenu',
                // 'appSidebarMenu',
                // 'appUserMenu',
            // ]
        ];
    }
}
