<?php

namespace app\modules\setup\controllers;

use app\controllers\base\BaseCrudController;
use app\modules\setup\models\base\BaseAppMenuSearch;
use app\modules\setup\models\MenuShortcutForm;

class MenuShortcutController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = MenuShortcutForm::class;
        $this->modelSearchClass = BaseAppMenuSearch::class;
        
        return parent::init();
    }
}
