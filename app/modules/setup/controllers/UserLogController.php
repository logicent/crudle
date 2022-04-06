<?php

namespace app\modules\setup\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use app\modules\setup\models\UserLog;
use app\modules\setup\models\UserLogSearch;

class UserLogController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = UserLog::class;
        $this->modelSearchClass = UserLogSearch::class;
        
        return parent::init();
    }
}
