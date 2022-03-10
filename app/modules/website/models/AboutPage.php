<?php

namespace app\modules\website\models;

use app\modules\setup\models\base\BaseSettingsForm;
use Yii;

class AboutPage extends BaseSettingsForm
{
    public $pageTitle;
    public $ourIntro;
    public $ourHistory;
    public $ourTeamHeading;
    public $ourTeamSubheading;
    public $footer;

    public function rules()
    {
        return [
            [[
                'pageTitle',
                'ourIntro',
                'ourHistory',
                'ourTeamHeading',
                'ourTeamSubheading',
                'footer'
            ], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'pageTitle' => Yii::t('app', 'Page title'),
            'ourIntro' => Yii::t('app', 'Introduction'),
            'ourHistory' => Yii::t('app', 'Our history'),
            'ourTeamHeading' => Yii::t('app', 'Our team heading'),
            'ourTeamSubheading' => Yii::t('app', 'Our team subheading'),
            'footer' => Yii::t('app', 'Footer'),
        ];
    }

    public function attributeHints()
    {
        return [
        ];
    }
}
