<?php

namespace app\helpers;

use app\enums\Type_Comment;
use app\enums\Status_Queue;
use app\modules\main\models\CommentForm;
use app\modules\setup\models\EmailNotificationSettingsForm;
use app\modules\setup\models\EmailQueue;
use app\modules\setup\models\Setup;
use app\modules\setup\models\SmtpSettingsForm;
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