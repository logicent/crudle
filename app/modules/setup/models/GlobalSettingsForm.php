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
    // public $enableSocialAuth    = false;
    // public $imageUploadRestrictions; // width:height:size:fileType

    public function rules()
    {
        return [
            [[
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
            'defaultLanguage'   =>  Yii::t('app', 'Default language'),
            'defaultTimeZone'   =>  Yii::t('app', 'Default timezone'),
            'defaultTimeFormat' =>  Yii::t('app', 'Default time format'),
            'defaultDateFormat' =>  Yii::t('app', 'Default date format'),
            'firstDayOfTheWeek' =>  Yii::t('app', 'First day of the week'),
            // 'enableSocialAuth'  =>  Yii::t('app', 'Enable social auth'),
            // 'imageUploadRestrictions'  =>  Yii::t('app', 'Image upload restrictions'),
        ];
    }
}
