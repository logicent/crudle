<?php

namespace app\modules\website\models;

use app\modules\setup\models\base\BaseSettingsForm;
use Yii;

class WebsiteSettingsForm extends BaseSettingsForm
{
    public $homePage;
    public $titlePrefix;
    public $theme;
    public $brandImage;
    public $brandHtml;
    public $setBannerFromImage;
    public $favicon;
    public $hideLogin;
    public $includeSearchInTopBar;
    public $showLanguagePicker;
    public $banner; // Banner is above the Top Menu Bar.
    public $footerLogo;
    public $copyright;
    public $address;
    public $showFooterSignup = false;
    public $enableGoogleIndexing = false;
    public $googleAnalyticsId;
    public $googleAnalyticsAnonymizeIP = true;
    public $appName;
    public $appLogo;
    public $disableSignUp = true;
    public $htmlHeader;
    public $robotsTxt;

    public function rules()
    {
        return [
            [[
                'homePage',
                'titlePrefix',
                'theme',
                'brandImage',
                'brandHtml',
                'favicon',
                'banner',
                'footerLogo',
                'copyright',
                'address',
                'googleAnalyticsId',
                'appName',
                'appLogo',
                'htmlHeader',
                'robotsTxt',
            ], 'string'],
            [[
                'setBannerFromImage',
                'hideLogin',
                'includeSearchInTopBar',
                'showLanguagePicker',
                'showFooterSignup',
                'enableGoogleIndexing',
                'googleAnalyticsAnonymizeIP',
                'disableSignUp',
            ], 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'homePage' => Yii::t('app', 'Home page'),
            'titlePrefix' => Yii::t('app', 'Title prefix'),
            'theme' => Yii::t('app', 'Theme'),
            'brandImage' => Yii::t('app', 'Brand image'),
            'brandHtml' => Yii::t('app', 'Brand HTML'),
            'favicon' => Yii::t('app', 'Favicon'),
            'banner' => Yii::t('app', 'Banner'),
            'footerLogo' => Yii::t('app', 'Footer logo'),
            'copyright' => Yii::t('app', 'Copyright'),
            'address' => Yii::t('app', 'Address'),
            'googleAnalyticsId' => Yii::t('app', 'Google Analytics ID'),
            'appName' => Yii::t('app', 'App name'),
            'appLogo' => Yii::t('app', 'App logo'),
            'htmlHeader' => Yii::t('app', 'HTML header'),
            'robotsTxt' => Yii::t('app', 'Robots.txt'),
            'setBannerFromImage' => Yii::t('app', 'Set banner from image'),
            'hideLogin' => Yii::t('app', 'Hide login'),
            'includeSearchInTopBar' => Yii::t('app', 'Include search in top bar'),
            'showLanguagePicker' => Yii::t('app', 'Show language picker'),
            'showFooterSignup' => Yii::t('app', 'Show footer signup'),
            'enableGoogleIndexing' => Yii::t('app', 'Enable google indexing'),
            'googleAnalyticsAnonymizeIP' => Yii::t('app', 'Google analytics anonymize IP'),
            'disableSignUp' => Yii::t('app', 'Disable signup'),
        ];
    }

    public function attributeHints()
    {
        return [
        ];
    }
}
