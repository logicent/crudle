<?php

namespace crudle\app\main\controllers\action;

use crudle\app\helpers\SendNotification;
use yii\base\Action;

class ResendNotificationAction extends Action
{
    public function run($id)
    {
        SendNotification::processQueueEntry($id);
    }
}