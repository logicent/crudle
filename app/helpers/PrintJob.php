<?php

namespace crudle\app\helpers;

use crudle\app\enums\Type_Comment;
use crudle\app\enums\Status_Queue;
use crudle\app\main\models\CommentForm;
use crudle\app\setup\models\EmailNotificationSettingsForm;
use crudle\app\setup\models\EmailQueue;
use crudle\app\setup\models\Setup;
use crudle\app\setup\models\SmtpSettingsForm;
use Exception;
use Yii;
use yii\helpers\Json;

class PrintJob
{
    public static function processQueue()
    {
        try {

        } catch(Exception $e) {

        }
    }

    public static function processQueueEntry( $id )
    {
    }
}
