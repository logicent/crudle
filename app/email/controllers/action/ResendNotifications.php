<?php

namespace crudle\app\email\controllers\action;

use crudle\app\email\helpers\SendNotification;
use yii\base\Action;

class ResendNotifications extends Action
{
    public function run()
    {
        SendNotification::processQueue();
    }
}