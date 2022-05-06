<?php

namespace crudle\app\setup\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\app\setup\models\EmailNotification;
use crudle\app\setup\models\search\EmailNotificationSearch;

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
