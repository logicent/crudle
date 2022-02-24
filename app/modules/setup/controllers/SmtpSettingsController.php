<?php

namespace app\modules\setup\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;
use app\modules\setup\models\Setup;
use app\modules\setup\models\SmtpSettingsForm;
use Yii;

class SmtpSettingsController extends BaseSettingsController
{
    public function init()
    {
        $this->modelClass = SmtpSettingsForm::class;

        return parent::init();
    }

    public function actionTestConnection()
    {
        $model = Setup::getSettings($this->modelClass);

        $config = [
                    'class' => 'yii\swiftmailer\Mailer',
                    'viewPath' => '@app/views/_mail',
                    'useFileTransport' => false,
                    'transport' => [
                        'class' => 'Swift_SmtpTransport',
                        'host' => $model->smtp_host,
                        'username' => $model->smtp_username,
                        'password' => $model->smtp_password,
                        'port' => $model->smtp_port,
                        'encryption' => $model->smtp_encryption,
                    ],
                ];

        $mailer = Yii::createObject($config);

        try
        {
            $mailer->compose()
                ->setFrom([ $model->from_address => $model->from_name ])
                ->setTo([ Yii::$app->user->identity->email => Yii::$app->user->identity->username ])
                ->setSubject(Yii::t('app', 'SMTP Test Connection'))
                ->setHtmlBody('
                    <p>Hey ' . Yii::$app->user->identity->username . ',</p> 
                    Umm, just testing this connection...<br>It seems to be working!
                    <p>' . Yii::$app->params['appShortName'] . '</p>')
                ->send();
            return 'Your response has been successfully sent';
        }
        catch(\Swift_TransportException $exception)
        {
            return $exception;
        }
    }
}
