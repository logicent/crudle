<?php

namespace crudle\app\user\controllers;

use crudle\app\crud\controllers\CrudController;
use crudle\app\user\models\UserLog;
use crudle\app\user\models\search\UserLogSearch;

class UserLogController extends CrudController
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
