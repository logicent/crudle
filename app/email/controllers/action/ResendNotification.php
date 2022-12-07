<?php

namespace crudle\app\email\controllers\action;

use crudle\app\email\helpers\SendNotification;
use yii\base\Action;

class ResendNotification extends Action
{
    public function run($id)
    {
        SendNotification::processQueueEntry($id);
    }
}