<?php

namespace crudle\setup\controllers;

use crudle\main\controllers\base\BaseCrudController;
use crudle\setup\models\UserLog;
use crudle\setup\models\UserLogSearch;

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
