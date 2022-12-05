<?php

namespace crudle\app\setup\controllers;

use crudle\app\main\controllers\base\CrudController;
use crudle\app\setup\models\UserGroup;
use crudle\app\setup\models\search\UserGroupSearch;

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
