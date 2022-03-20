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
    public $hideTeamSection;
    public $showTeamMemberBio;
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
            [['hideTeamSection', 'showTeamMemberBio'], 'boolean']
        ];
    }

    public function attributeLabels()
    {
        return [
            'pageTitle' => Yii::t('app', 'Page title'),
            'ourIntro' => Yii::t('app', 'Our introduction'),
            'ourHistory' => Yii::t('app', 'Our history'),
            'ourTeamHeading' => Yii::t('app', 'Our team heading'),
            'ourTeamSubheading' => Yii::t('app', 'Our team subheading'),
            'hideTeamSection' => Yii::t('app', 'Hide team section'),
            'showTeamMemberBio' => Yii::t('app', 'Show team member bio'),
            'footer' => Yii::t('app', 'Footer'),
        ];
    }

    public function attributeHints()
    {
        return [
        ];
    }
}
