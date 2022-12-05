<?php

namespace crudle\app\setup\models;

use crudle\app\setup\models\base\BaseSettingsForm;
use Yii;

class DeveloperSettingsForm extends BaseSettingsForm
{
    public $endUserLicense; // Terms of Use, Privacy Policy, End-User License Agreement
    public $endUserReference;
    public $licenseValidFrom;
    public $licenseValidTo;
    public $userLimit = 0; // 0 is default i.e. none
    // Additional modules
    public $enableUserModules = false;
    // Auth Integrations
    public $enableSocialAuth = false;

    public function rules()
    {
        return [
            // [['endUserLicense', 'endUserRef', 'licenseValidFrom', 'licenseValidTo'], 'required'],
            [['userLimit', 
                'enableSocialAuth',
                'enableUserModules',
            ], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'endUserLicense' => Yii::t('app', 'End user license'),
            'endUserReference' => Yii::t('app', 'End user reference'),
            'licenseValidFrom' => Yii::t('app', 'License valid from'),
            'licenseValidTo' => Yii::t('app', 'License valid to'),
            'userLimit' => Yii::t('app', 'User limit'),
            'enableUserModules' => Yii::t('app', 'Enable user modules'),
            'enableSocialAuth' => Yii::t('app', 'Enable social auth'),
        ];
    }

    public function attributeHints()
    {
        return [
            // 'endUserLicense' => Yii::t('app', 'License key'),
            'endUserReference' => Yii::t('app', 'Sales Contract/Invoice ref. no.'),
            // 'licenseValidFrom' => Yii::t('app', 'Effective start date'),
            // 'licenseValidTo' => Yii::t('app', 'Effective end date'),
            'userLimit' => Yii::t('app', 'Max no. of supported users'),
        ];
    }
}
