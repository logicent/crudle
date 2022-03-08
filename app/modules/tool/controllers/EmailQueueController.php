<?php

namespace app\modules\tool\controllers;

use app\controllers\base\BaseCrudController;
use app\modules\tool\models\EmailQueue;
use app\modules\tool\models\EmailQueueSearch;

class EmailQueueController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = EmailQueue::class;
        $this->modelSearchClass = EmailQueueSearch::class;

        return parent::init();
    }
}
