<?php

namespace crudle\setup\models;

use crudle\setup\models\base\BaseSettingsForm;
use Yii;

class IntegrationSettingsForm extends BaseSettingsForm
{
    public $mpesaApiKey, $ussdApiKey;

    public function rules()
    {
        return [
            [['mpesaApiKey', 'ussdApiKey'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'mpesaApiKey' => Yii::t('app', 'M-pesa API Key'),
            'ussdApiKey' => Yii::t('app', 'USSD API Key'),
        ];
    }
}
