<?php

namespace website\models;

use crudle\main\enums\Type_Relation;
use crudle\main\models\UploadForm;
use crudle\setup\models\base\BaseSettingsForm;
use Yii;

class AboutPage extends BaseSettingsForm
{
    public $pageTitle;
    public $ourIntro;
    public $ourHistory;
    public $ourHistoryHeading;
    public $ourTeamHeading;
    public $ourTeamSubheading;
    public $hideTeamSection;
    public $teamMember;
    public $showTeamMemberBio = true;
    public $footer;
    public $photoImage;

    public function init()
    {
        $this->uploadForm = new UploadForm();
        $this->fileAttribute = 'photoImage';
    }

    public function rules()
    {
        return [
            [[
                'pageTitle',
                'ourIntro',
                'ourHistory',
                'ourHistoryHeading',
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
            'teamMember' => [
                'class' => AboutTeamMember::class,
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
                'teamMember',
            // ]
        ];
    }
}
