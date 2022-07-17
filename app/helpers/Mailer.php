<?php

namespace crudle\app\helpers;

use crudle\app\setup\models\Setup;
use crudle\app\setup\models\SmtpSettingsForm;
use Yii;

class Mailer
{
    public static function send($msg, $from_support = false, $addAttachments = null)
    {
        $mailer = self::getMailer();
        // if (is_null($mailer))
        //     $mailer = Yii::$app->mailer->compose();

        $message = $mailer->compose()
            ->setFrom($msg->from)
            ->setTo($msg->to)
            ->setSubject($msg->subject)
            ->setHtmlBody($msg->message);

        if (!empty($msg->attachments)) // attach file from local file system
            $mailer->attach($msg->attachments[0]); // loop through them if more than 1.

        if (!empty($addAttachments)) // create attachment on-the-fly
            $mailer->attachContent($addAttachments->content, ['fileName' => $addAttachments->filename, 'contentType' => 'application/pdf']);

        try {
            $mailer->send($message);
        } catch (\Swift_SwiftException $e) {
            // display error encountered
            echo $e->errorInfo[2]; // getMessage()?
        }
    }

    public static function getMailer($viewPath = '@app/views/_mail')
    {
        $model = Setup::getSettings(SmtpSettingsForm::class);

        $config = [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => $viewPath,
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

        return Yii::createObject($config);
    }
}