<?php

namespace crudle\app\setup\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\app\setup\models\UserLog;
use crudle\app\setup\models\search\UserLogSearch;

class UserLogController extends BaseCrudController
{
    public function modelClass(): string
    {
        return UserLog::class;
    }

    public function searchModelClass(): string
    {
        return UserLogSearch::class;
    }
}
