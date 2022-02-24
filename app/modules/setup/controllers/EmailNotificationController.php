<?php

namespace app\modules\setup\controllers;

use app\modules\setup\controllers\base\BaseSetupCrudController;
use app\modules\setup\models\EmailNotification;

class EmailNotificationController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = EmailNotification::class;
        
        return parent::init();
    }
}
