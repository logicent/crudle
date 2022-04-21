<?php

namespace app\helpers;

use app\enums\Type_Comment;
use app\enums\Status_Queue;
use app\models\CommentForm;
use crudle\setup\models\EmailNotificationSettingsForm;
use crudle\setup\models\EmailQueue;
use crudle\setup\models\Setup;
use crudle\setup\models\SmtpSettingsForm;
use Yii;
use yii\helpers\Json;

class SendNotification
{
    public static function processQueue()
    {
        $model_email_settings = Setup::getSettings(EmailNotificationSettingsForm::class);
        if ( (bool) $model_email_settings->notifications_paused )
            Yii::$app->end();

        $messages = EmailQueue::find()->where(['sent_at' => null])->all();
        // get mailer instance from custom smtp settings
        $mailer = self::getMailer();

        foreach ($messages as $message)
        {
            try {
                $email_body = Json::decode($message->message);

                try {
                    $fromAddress = Json::decode($message->from);
                }
                catch(yii\base\InvalidArgumentException $e)
                {
                    $fromAddress = $message->from;
                }
                try {
                    $toAddress = Json::decode($message->to);
                }
                catch(yii\base\InvalidArgumentException $e)
                {
                    $toAddress =  $message->to;
                }

                $emailMsg = $mailer->compose(['html' =>'EmailNotification'], ['content' => $email_body])
                                ->setFrom($fromAddress)
                                ->setTo($toAddress)
                                ->setSubject($message->subject);

                if ( !empty($message->cc) )
                    $emailMsg->setCc(Json::decode($message->cc));

                if ( !empty($message->attachments) ) // attach file from local file system
                    foreach ($message->attachments as $attachment)
                        $emailMsg->attach($attachment); // loop through them if more than 1.

                // if ( !empty($addAttachments) ) // create attachment on-the-fly
                //     $emailMsg->attachContent($addAttachment->content, //FIXME: Problem here $addAttachment
                //             [
                //                 'fileName' => $addAttachment->filename, 
                //                 'contentType' => 'application/pdf'
                //             ]);

                $emailMsg->send();

                $message->status = Yii::t('app', 'Sent');
                $message->sent_at = date('Y-m-d H:m:s', time());
                $message->save(false);
            }
            catch (\Swift_SwiftException $e)
            {
                $message->status = Yii::t('app', 'Not Sent');
                $message->save(false);
                // persist the error message in DB
                $comment = new CommentForm();
                $comment->comment = $e->getMessage();
                $comment->save( $message, true, Type_Comment::ErrorMessage );
                // skip to next event message notification
                continue;
                // in debug mode display error encountered
                echo $e->getMessage();
            }
        }
    }

    public static function processQueueEntry( $id )
    {
        $model = EmailQueue::findOne( $id );
        // get mailer instance from custom smtp settings
        $mailer = self::getMailer();

        try {
            $email_body = Json::decode($model->message);
            
            try {
                $fromAddress = Json::decode($model->from);
            }
            catch(yii\base\InvalidArgumentException $e)
            {
                $fromAddress = $model->from;
            }
            try {
                $toAddress = Json::decode($model->to);
            }
            catch(yii\base\InvalidArgumentException $e)
            {
                $toAddress =  $model->to;
            }

            $emailMsg = $mailer->compose(['html' =>'EmailNotification'], ['content' => $email_body])
                            ->setFrom($fromAddress)
                            ->setTo($toAddress)
                            ->setSubject($model->subject);

            if ( !empty($model->cc) )
                $emailMsg->setCc(Json::decode($model->cc));

            if ( !empty($model->attachments) ) // attach file from local file system
                foreach ($model->attachments as $attachment)
                    $emailMsg->attach($attachment); // loop through them if more than 1.

            // if ( !empty($addAttachments) ) // create attachment on-the-fly
            //     $emailMsg->attachContent($addAttachment->content, //FIXME: Problem here $addAttachment
            //             [
            //                 'fileName' => $addAttachment->filename, 
            //                 'contentType' => 'application/pdf'
            //             ]);

            $emailMsg->send();

            $model->status = Status_Queue::Sent;
            $model->sent_at = date('Y-m-d H:m:s', time());
            $model->save(false);
        }
        catch (\Swift_SwiftException $e)
        {
            $model->status = Status_Queue::Error;
            $model->save(false);
            // persist the error message in DB
            $comment = new CommentForm();
            $comment->comment = $e->getMessage();
            $comment->save( $model, true, Type_Comment::ErrorMessage );
        }
    }

    public static function getMailer()
    {
        $model = Setup::getSettings(SmtpSettingsForm::class);

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

        return Yii::createObject($config);
    }
}
