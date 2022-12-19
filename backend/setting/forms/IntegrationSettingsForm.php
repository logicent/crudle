<?php

namespace crudle\app\setting\forms;

use crudle\app\setting\models\base\BaseSettingsForm;
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
