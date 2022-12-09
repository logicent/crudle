<?php

namespace crudle\app\email\controllers;

use crudle\app\crud\controllers\CrudController;
use crudle\app\email\models\EmailQueue;
use crudle\app\email\models\search\EmailQueueSearch;

class QueueController extends CrudController
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
