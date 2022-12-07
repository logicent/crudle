<?php

namespace crudle\app\email\forms;

use crudle\app\setup\models\base\BaseSettingsForm;
use Yii;

class SmtpSettingsForm extends BaseSettingsForm
{
    public $smtp_host;
    public $from_address;
    public $from_name;
    public $smtp_username;
    public $smtp_password;
    public $smtp_port;
    public $smtp_encryption;
    public $smtp_timeout;

    public function rules()
    {
        return [
            [['smtp_host', 'smtp_username', 'smtp_password', 'smtp_port'], 'required'],
            [['from_address'], 'email'],
            [['from_address', 'from_name', 'smtp_encryption'], 'string'],
            [['smtp_port', 'smtp_timeout'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'smtp_host' => Yii::t('app', 'Host'),
            'from_address' => Yii::t('app', 'From address'),
            'from_name' => Yii::t('app', "From name"),
            'smtp_username' => Yii::t('app', "Username"),
            'smtp_password' => Yii::t('app', "Password"),
            'smtp_port' => Yii::t('app', 'Port'),
            'smtp_encryption' => Yii::t('app', 'Encryption'),
            'smtp_timeout' => Yii::t('app', 'Timeout'),
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
