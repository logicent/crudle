<?php

namespace app\modules\setup\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use app\modules\setup\models\EmailNotification;
use app\modules\setup\models\EmailNotificationSearch;

class EmailNotificationController extends BaseCrudController
{
    public function modelClass(): string
    {
        return EmailNotification::class;
    }

    public function searchModelClass(): string
    {
        return EmailNotificationSearch::class;
    }
}
