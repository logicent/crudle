<?php

namespace app\modules\tool\controllers;

use app\controllers\base\BaseCrudController;
use app\modules\tool\models\EmailNotification;
use app\modules\tool\models\EmailNotificationSearch;

class EmailNotificationController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = EmailNotification::class;
        $this->modelSearchClass = EmailNotificationSearch::class;
        
        return parent::init();
    }
}
