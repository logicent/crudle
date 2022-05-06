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
    public $allow_salesPersonLogin = false;
    // Additional modules
    public $enable_website = false;
    public $enable_eCommerce = false;
    public $enable_CRM = false;
    // Integrations
    public $enable_socialAuth = false;
    public $enable_dataAnalytics = false;
    public $enable_mobileMoneyPayment = true;

    public function rules()
    {
        return [
            // [['endUserLicense', 'endUserRef', 'licenseValidFrom', 'licenseValidTo'], 'required'],
            [['userLimit', 
                'allow_salesPersonLogin',
                'enable_website',
                'enable_eCommerce',
                'enable_CRM',
                'enable_socialAuth',
                'enable_mobileMoneyPayment',
                'enable_dataAnalytics',
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
            'allow_salesPersonLogin' => Yii::t('app', 'Allow sales person to log in as user'),
            'enable_mobileMoneyPayment' => Yii::t('app', 'Enable mobile money payment'),
            'enable_dataAnalytics' => Yii::t('app', 'Enable data analytics'),
            'enable_eCommerce' => Yii::t('app', 'Enable e-commerce'),
            'enable_website' => Yii::t('app', 'Enable website'),
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
            // 'allow_salesPersonLogin' => Yii::t('app', 'Allow sales person user login'),
            'enable_eCommerce' => Yii::t('app', 'Support online ordering and payments'),
            'enable_mobileMoneyPayment' => Yii::t('app', 'Accept mobile money payment via POS'),
            'enable_dataAnalytics' => Yii::t('app', 'Web-based data analytics using supported API'),
        ];
    }
}
