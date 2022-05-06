<?php

namespace crudle\app\setup\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\app\setup\models\EmailQueue;
use crudle\app\setup\models\search\EmailQueueSearch;

class EmailQueueController extends BaseCrudController
{
    public function modelClass(): string
    {
        return EmailQueue::class;
    }

    public function searchModelClass(): string
    {
        return EmailQueueSearch::class;
    }
}
