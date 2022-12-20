<?php
namespace crudle\app\email\commands;

use crudle\app\email\helpers\SendNotification;
use yii\console\Controller;

class QueueController extends Controller
{
    public function actionSendNotifications()
    {
        SendNotification::processQueue();
    }

    public function actionShowQueue()
    {
        return '';
    }

    public function actionShowErrors($limit = 5)
    {
        return $limit;
    }

    public function actionSmtpStatus($attribute)
    {
        return $attribute;
    }
}
