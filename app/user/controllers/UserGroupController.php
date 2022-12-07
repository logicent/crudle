<?php

namespace crudle\app\user\controllers;

use crudle\app\crud\controllers\CrudController;
use crudle\app\user\models\UserGroup;
use crudle\app\user\models\search\UserGroupSearch;

class UserGroupController extends CrudController
{
    public function modelClass(): string
    {
        return UserGroup::class;
    }

    public function searchModelClass(): string
    {
        return UserGroupSearch::class;
    }
}
