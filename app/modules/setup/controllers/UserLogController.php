<?php

namespace app\modules\setup\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use app\modules\setup\models\UserLog;
use app\modules\setup\models\UserLogSearch;

class UserLogController extends BaseCrudController
{
    public function modelClass()
    {
        return UserLog::class;
    }

    public function searchModelClass()
    {
        return UserLogSearch::class;
    }
}
