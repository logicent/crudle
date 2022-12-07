<?php

namespace crudle\ext\web_cms\models;

use crudle\app\crud\enums\Type_Relation;
use crudle\app\setup\models\base\BaseSettingsForm;
use Yii;

class AboutPage extends BaseSettingsForm
{
    public $pageTitle;
    public $ourIntro;
    public $ourHistoryHeading;
    public $ourHistory;
    public $ourPresent;
    public $ourPresentHeading;
    public $ourFuture;
    public $ourFutureHeading;
    public $ourTeamHeading;
    public $ourTeamSubheading;
    public $hideTeamSection;
    public $aboutTeamMember;
    public $showTeamMemberBio = true;
    public $footer;
    // Don't persist in DB
    public $photoImage;

    public function rules()
    {
        return [
            [[
                'pageTitle',
                'ourIntro',
                'ourHistory',
                'ourHistoryHeading',
                'ourPresent',
                'ourPresentHeading',
                'ourFuture',
                'ourFutureHeading',
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
            'ourHistoryHeading' => Yii::t('app', 'Our history heading'),
            'ourPresent' => Yii::t('app', 'Our present'),
            'ourPresentHeading' => Yii::t('app', 'Our present heading'),
            'ourFuture' => Yii::t('app', 'Our future'),
            'ourFutureHeading' => Yii::t('app', 'Our future heading'),
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
            'ourIntro' => 'Introduce your organization to the website visitor.',
            'ourHistoryHeading' => '"Your organization history"',
            'ourTeamHeading' => '"Team Members" or "Management"',
            'footer' => 'More content for the bottom of the page.',
        ];
    }


    public static function relations(): array
    {
        return [
            'aboutTeamMember' => [
                'class' => AboutTeamMember::class,
                'type' => Type_Relation::InlineModel,
            ],
            'footer' => [
                'class' => AboutFooter::class,
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
                'aboutTeamMember',
            // ]
        ];
    }
}
