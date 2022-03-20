<?php

namespace app\modules\website\models;

use app\modules\setup\models\base\BaseSettingsForm;
use Yii;

class ContactPage extends BaseSettingsForm
{
    public $pageTitle;
    public $forwardToEmail;
    public $heading;
    public $subheading;
    public $shortIntro;
    public $enquiryDetail;
    public $hideContactForm;

    public function rules()
    {
        return [
            [[
                'pageTitle',
                'forwardToEmail',
                'heading',
                'shortIntro',
                'enquiryDetail',
            ], 'string'],
            ['hideContactForm', 'boolean']
        ];
    }

    public function attributeLabels()
    {
        return [
            'pageTitle' => Yii::t('app', 'Page title'),
            'forwardToEmail' => Yii::t('app', 'Forward to email'),
            'heading' => Yii::t('app', 'Heading'),
            'subheading' => Yii::t('app', 'Sub-heading'),
            'shortIntro' => Yii::t('app', 'A brief intro'),
            'enquiryDetail' => Yii::t('app', 'Enquiry detail'),
            'hideContactForm' => Yii::t('app', 'Hide contact form'),
        ];
    }

    public function attributeHints()
    {
        return [
        ];
    }
}
