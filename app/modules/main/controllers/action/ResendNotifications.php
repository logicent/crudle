<?php

namespace crudle\app\main\controllers\action;

use crudle\app\helpers\SendNotification;
use yii\base\Action;

class ResendNotifications extends Action
{
    public function run()
    {
        SendNotification::processQueue();
    }
}