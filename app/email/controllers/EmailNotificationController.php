<?php

namespace crudle\app\setup\controllers;

use crudle\app\main\controllers\base\CrudController;
use crudle\app\setup\models\EmailNotification;
use crudle\app\setup\models\search\EmailNotificationSearch;

class EmailNotificationController extends CrudController
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
