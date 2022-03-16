<?php

namespace app\modules\setup\controllers;

use app\controllers\base\BaseCrudController;
use app\modules\setup\models\UserGroup;
use app\modules\setup\models\UserGroupSearch;

class UserGroupController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = UserGroup::class;
        $this->modelSearchClass = UserGroupSearch::class;
        
        return parent::init();
    }
}
