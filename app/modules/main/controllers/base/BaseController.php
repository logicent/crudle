<?php

namespace crudle\app\main\controllers\base;

use crudle\app\main\controllers\action\ResendNotification;
use crudle\app\main\controllers\action\ResendNotifications;
use crudle\app\main\controllers\action\StoreUserPreferences;
use crudle\app\setup\models\Setup;
use crudle\app\setup\models\SmtpSettingsForm;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;

abstract class BaseController extends Controller
{
    protected $model;

    public function actions()
    {
        return [
            'resend-notification'   => ResendNotification::class,
            'resend-notifications'  => ResendNotifications::class,
            'store-user-preferences'    => StoreUserPreferences::class,
        ];
    }

    protected function uploadFile(&$model)
    {
        $fileObj = UploadedFile::getInstance($model->uploadForm, 'file_upload');

        if ($fileObj)
        {
            $model->uploadForm->file_upload = $fileObj;
            // if saveAs succeeded file_path is returned else false
            return $model->uploadForm->upload();
        }

    //     $model->uploadForm->file_upload = UploadedFile::getInstance(
    //         $model->uploadForm,
    //         "file_upload"
    //     );
    //     if (!is_null($model->uploadForm->file_upload))
    //         return $model->uploadForm->upload(); // filePath

    //     return false;
    }

    protected function uploadFiles(&$model)
    {
        $fileObjects = UploadedFile::getInstances($model->uploadForm, 'file_uploads');
        if ($fileObjects)
        {
            $model->uploadForm->file_uploads = $fileObjects;
            // if saveAs succeeded file_path is returned else false
            return $model->uploadForm->uploads();
        }
        // $model->uploadForm->file_uploads = UploadedFile::getInstances(
        //     $model->uploadForm,
        //     "file_uploads"
        // );
        // if (!is_null($model->uploadForm->file_uploads))
        //     return $model->uploadForm->uploads(); // filePaths

        // return false;
    }

    public function sendMail($msg, $from_support = false, $addAttachments = null)
    {
        $mailer = $this->getMailer();
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
            echo $e->errorInfo[2];
        }
    }

    public function getMailer()
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

    public function refresh($anchor = '')
    {
        // stop executing this action and refresh the current page
        return $this->refresh();
    }

    // public function afterAction($action, $result)
    // {
    //     $result = parent::afterAction($action, $result);
    //     // your custom code here
    //     // Yii::$app->response->statusCode = 200;
    //     // get URLs for back button - not working perhaps use a cache of links
    //         // Do this for all actionIndex
    //     return $result;
    // }
}
