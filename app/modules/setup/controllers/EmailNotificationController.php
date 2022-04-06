<?php

namespace app\modules\setup\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use app\modules\setup\models\EmailNotification;
use app\modules\setup\models\EmailNotificationSearch;

class EmailNotificationController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = EmailNotification::class;
        $this->modelSearchClass = EmailNotificationSearch::class;
        
        return parent::init();
    }
}
