<?php

namespace website\models;

use app\modules\main\models\UploadForm;
use app\modules\setup\models\base\BaseSettingsForm;
use Yii;

class WebsiteSettingsForm extends BaseSettingsForm
{
    public $homePage = 'home';
    public $titlePrefix;
    public $theme;
    public $brandImage;
    public $brandHtml = "<img src='undefined'>";
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

    public function init()
    {
        $this->uploadForm = new UploadForm();
        $this->fileAttribute = 'brandImage';
    }

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
            'theme' => Yii::t('app', 'Website theme'),
            'brandImage' => Yii::t('app', 'Brand image'),
            'brandHtml' => Yii::t('app', 'Brand HTML'),
            'favicon' => Yii::t('app', 'Favicon'),
            'banner' => Yii::t('app', 'Banner HTML'),
            'footerLogo' => Yii::t('app', 'Footer logo'),
            'copyright' => Yii::t('app', 'Copyright'),
            'address' => Yii::t('app', 'Address'),
            'googleAnalyticsId' => Yii::t('app', 'Google Analytics ID'),
            'appName' => Yii::t('app', 'App name'),
            'appLogo' => Yii::t('app', 'App logo'),
            'htmlHeader' => Yii::t('app', '<head> HTML'),
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
            'homePage' => Yii::t('app', "Link that is the website home page. Standard Links (home, login, products, blog, about, contact)"),
            'titlePrefix' => Yii::t('app', 'Show title in browser window as "Prefix - title"'),
            'brandImage' => Yii::t('app', 'Select an image of approx width 150px with a transparent background for best results.'),
            'brandHtml' => Yii::t('app', 'Brand is what appears on the top-left of the toolbar. If it is an image, make sure it has a transparent background and use the <img /> tag. Keep size as 200px x 30px'),
            'favicon' => Yii::t('app', 'An icon file with .ico extension. Should be 16 x 16 px. Generated using a favicon generator. [favicon-generator.org]'),
            'disableSignUp' => Yii::t('app', 'Disable Customer Signup link in Login page'),
            'htmlHeader' => Yii::t('app', "Added HTML in the &lt;head&gt; section of the web page, primarily used for website verification and SEO"),
            'banner' => Yii::t('app', 'Banner is above the Top Menu Bar.'),
            'address' => Yii::t('app', 'Address and other legal information you may want to put in the footer.'),
        ];
    }
}
