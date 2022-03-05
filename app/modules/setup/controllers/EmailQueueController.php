<?php

namespace app\modules\setup\controllers;

use app\controllers\base\BaseCrudController;
use app\modules\setup\models\EmailQueue;
use app\modules\setup\models\EmailQueueSearch;
use yii\data\ActiveDataProvider;

class EmailQueueController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = EmailQueue::class;
        $this->modelSearchClass = EmailQueueSearch::class;

        return parent::init();
    }
}
