<?php
namespace crudle\app\setup\commands;

use crudle\app\helpers\SendNotification;
use yii\console\Controller;

class EmailQueueController extends Controller
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
