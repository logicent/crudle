<?php

namespace app\modules\setup\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use app\modules\setup\models\PrintStyle;
use app\modules\setup\models\PrintStyleSearch;

class PrintStyleController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = PrintStyle::class;
        $this->modelSearchClass = PrintStyleSearch::class;

        return parent::init();
    }
}
