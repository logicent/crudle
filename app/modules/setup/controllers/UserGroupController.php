<?php

namespace crudle\app\setup\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\app\setup\models\UserGroup;
use crudle\app\setup\models\search\UserGroupSearch;

class UserGroupController extends BaseCrudController
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
