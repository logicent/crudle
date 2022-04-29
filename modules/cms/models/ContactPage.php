<?php

namespace logicent\cms\models;

use crudle\setup\models\base\BaseSettingsForm;
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
            'forwardToEmail' => 'Send enquiries to this email address',
            'heading' => 'Default: "Contact Us"',
            'shortIntro' => 'Introductory information for the Contact Us Page',
            'enquiryDetail' => 'Contact options, like "Sales Query, Support Query" etc each on a new line or separated by commas.'
        ];
    }
}
