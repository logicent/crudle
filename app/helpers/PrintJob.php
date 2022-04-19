<?php

namespace app\helpers;

use app\enums\Type_Comment;
use app\enums\Status_Queue;
use crudle\main\models\CommentForm;
use crudle\setup\models\EmailNotificationSettingsForm;
use crudle\setup\models\EmailQueue;
use crudle\setup\models\Setup;
use crudle\setup\models\SmtpSettingsForm;
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
