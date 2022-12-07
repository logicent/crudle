<?php

namespace crudle\app\email\controllers;

use crudle\app\crud\controllers\CrudController;
use crudle\app\email\models\EmailNotification;
use crudle\app\email\models\search\EmailNotificationSearch;

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
