<?php

namespace app\modules\setup\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use app\modules\setup\models\EmailQueue;
use app\modules\setup\models\EmailQueueSearch;

class EmailQueueController extends BaseCrudController
{
    public function modelClass()
    {
        return EmailQueue::class;
    }

    public function searchModelClass()
    {
        return EmailQueueSearch::class;
    }
}
