<?php

namespace crudle\app\setup\models;

use crudle\app\upload\forms\UploadForm;
use crudle\app\setup\models\base\BaseSettingsForm;
use Yii;

class GeneralSettingsForm extends BaseSettingsForm
{
    public $name;
    public $shortName;
    public $location;
    public $contacts;
    public $logoPath;
    public $websiteUrl;
    public $emailAddress;
    public $defaultLanguage     = 'en'; // en-US or en-GB
    public $defaultTimeZone     = 'Africa/Nairobi';
    public $defaultTimeFormat   = 'HH:mm';
    public $defaultDateFormat   = 'yyyy-mm-dd'; // dd/mm/yy
    public $firstDayOfTheWeek   = 'Sun'; // or Mon
    // public $enableSocialAuth    = false;
    // public $imageUploadRestrictions; // width:height:size:fileType

    public function init()
    {
        $this->uploadForm = new UploadForm();
        $this->fileAttribute = 'logoPath';
    }

    public function rules()
    {
        return [
            [[
                'name',
                'shortName',
                'location',
                'contacts',
                'logoPath',
                'websiteUrl',
                'emailAddress',
                'defaultLanguage',
                'defaultTimeZone',
                'defaultTimeFormat',
                'defaultDateFormat',
                'firstDayOfTheWeek',
                // 'enableSocialAuth',
                // 'imageUploadRestrictions',
            ], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name'   =>  Yii::t('app', 'Name'),
            'shortName'   =>  Yii::t('app', 'Short name'),
            'location'   =>  Yii::t('app', 'Physical address'),
            'contacts'   =>  Yii::t('app', 'Contacts'),
            'logoPath'   =>  Yii::t('app', 'Logo'),
            'websiteUrl'   =>  Yii::t('app', 'Website URL'),
            'emailAddress'   =>  Yii::t('app', 'Email address'),
            'defaultLanguage'   =>  Yii::t('app', 'Default language'),
            'defaultTimeZone'   =>  Yii::t('app', 'Default timezone'),
            'defaultTimeFormat' =>  Yii::t('app', 'Default time format'),
            'defaultDateFormat' =>  Yii::t('app', 'Default date format'),
            'firstDayOfTheWeek' =>  Yii::t('app', 'First day of the week'),
            // 'enableSocialAuth'  =>  Yii::t('app', 'Enable social auth'),
            // 'imageUploadRestrictions'  =>  Yii::t('app', 'Image upload restrictions'),
        ];
    }

    public function attributeHints()
    {
        return [
            'shortName' => Yii::t('app', 'Acronym, brand or trading name'),
            'name' => Yii::t('app', 'Business, institution or organization name'),
        ];
    }
}
