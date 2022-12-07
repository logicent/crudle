<?php

namespace crudle\app\setup\controllers;

use crudle\app\crud\controllers\CrudController;
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
