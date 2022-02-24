<?php

namespace app\modules\setup\models;

use app\modules\setup\models\base\BaseSettingsForm;
use Yii;

class GlobalSettingsForm extends BaseSettingsForm
{
    public $defaultLanguage     = 'en'; // en-US or en-GB
    public $defaultTimeZone     = 'Africa/Nairobi';
    public $defaultTimeFormat   = 'HH:mm';
    public $defaultDateFormat   = 'yyyy-mm-dd'; // dd/mm/yy
    public $firstDayOfTheWeek   = 'Sun'; // or Mon
    public $showViewCaptions    = true;
    public $bgImagePath         = null;
    public $bgImageStyles       = null;
    // public $enableSocialAuth    = false;
    // public $flashMessagePosition; // Top/Bottom:Left/Center/Right
    // public $imageUploadRestrictions; // width:height:size:fileType

    public function init()
    {
        $this->uploadForm = new \app\models\UploadForm();
        $this->fileAttribute = 'bgImagePath';
    }

    public function rules()
    {
        return [
            [[
                'defaultLanguage',
                'defaultTimeZone',
                'defaultTimeFormat',
                'defaultDateFormat',
                'firstDayOfTheWeek',
                'showViewCaptions',
                'bgImagePath',
                'bgImageStyles',
                // 'enableSocialAuth',
            ], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'defaultLanguage'   =>  Yii::t('app', 'Default language'),
            'defaultTimeZone'   =>  Yii::t('app', 'Default timezone'),
            'defaultTimeFormat' =>  Yii::t('app', 'Default time format'),
            'defaultDateFormat' =>  Yii::t('app', 'Default date format'),
            'firstDayOfTheWeek' =>  Yii::t('app', 'First day of the week'),
            'showViewCaptions'  =>  Yii::t('app', 'Show list view captions'),
            'bgImagePath'       =>  Yii::t('app', "Background image"),
            'bgImageStyles'     =>  Yii::t('app', "Background image styles (CSS)"),
            // 'enableSocialAuth'  =>  Yii::t('app', 'Enable social auth'),
        ];
    }
}
