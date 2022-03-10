<?php

namespace app\modules\website\models;

use app\modules\setup\models\base\BaseSettingsForm;
use Yii;

class ContactPage extends BaseSettingsForm
{
    public $pageTitle;
    public $forwardToEmail;
    public $heading;
    public $shortIntro;
    public $enquiryDetail;

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
        ];
    }

    public function attributeLabels()
    {
        return [
            'pageTitle' => Yii::t('app', 'Page title'),
            'forwardToEmail' => Yii::t('app', 'Forward to email'),
            'heading' => Yii::t('app', 'Heading'),
            'shortIntro' => Yii::t('app', 'Introduction'),
            'enquiryDetail' => Yii::t('app', 'Enquiry detail'),
        ];
    }

    public function attributeHints()
    {
        return [
        ];
    }
}
