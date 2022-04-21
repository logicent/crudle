<?php

namespace crudle\setup\controllers;

use crudle\main\controllers\base\BaseCrudController;
use crudle\setup\models\UserGroup;
use crudle\setup\models\UserGroupSearch;

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
