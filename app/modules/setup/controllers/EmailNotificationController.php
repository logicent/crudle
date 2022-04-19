<?php

namespace crudle\setup\controllers;

use crudle\main\controllers\base\BaseCrudController;
use crudle\setup\models\EmailNotification;
use crudle\setup\models\EmailNotificationSearch;

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
