<?php

namespace app\modules\setup\controllers;

use app\controllers\base\BaseCrudController;
use app\modules\setup\models\base\BaseAppMenuSearch;
use app\modules\setup\models\CreateMenuForm;

class CreateMenuController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = CreateMenuForm::class;
        $this->modelSearchClass = BaseAppMenuSearch::class;
        
        return parent::init();
    }
}
