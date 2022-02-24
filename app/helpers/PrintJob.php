<?php

namespace app\helpers;

use app\enums\Type_Comment;
use app\enums\Status_Queue;
use app\models\CommentForm;
use app\models\setup\EmailNotificationSettingsForm;
use app\models\setup\EmailQueue;
use app\modules\setup\models\Setup;
use app\models\setup\SmtpSettingsForm;
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