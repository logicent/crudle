<?php

namespace app\modules\setup\controllers;

use app\controllers\base\BaseCrudController;
use app\modules\setup\models\base\BaseAppMenuSearch;
use app\modules\setup\models\HelpMenuForm;

class HelpMenuController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = HelpMenuForm::class;
        $this->modelSearchClass = BaseAppMenuSearch::class;
        
        return parent::init();
    }
}
