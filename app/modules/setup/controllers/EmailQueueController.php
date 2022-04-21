<?php

namespace crudle\setup\controllers;

use crudle\main\controllers\base\BaseCrudController;
use crudle\setup\models\EmailQueue;
use crudle\setup\models\EmailQueueSearch;

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
