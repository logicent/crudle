<?php

namespace website\models;

use crudle\setup\models\base\BaseSettingsForm;
use Yii;

class GoogleSettingsForm extends BaseSettingsForm
{
    public $enableGoogleApi;
    public $clientId;
    public $creditSecret;
    public $apiKey;
    public $enableGoogleDrivePicker;
    public $appId;

    public function rules()
    {
        return [
            [['clientId', 'creditSecret', 'apiKey', 'appId'], 'string'],
            [['enableGoogleApi', 'enableGoogleDrivePicker'], 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'enableGoogleApi' => Yii::t('app', 'Enable google API'),
            'clientId' => Yii::t('app', 'Client ID'),
            'creditSecret' => Yii::t('app', "Credit secret"),
            'apiKey' => Yii::t('app', "API key"),
            'enableGoogleDrivePicker' => Yii::t('app', "Enable google drive picker"),
            'appId' => Yii::t('app', 'App ID'),
        ];
    }

    public function attributeHints()
    {
        return [
            'from_address' => Yii::t('app', 'The email address used when sending email'),
            'from_name' => Yii::t('app', "The 'From' name used when sending email"),
        ];
    }
}
