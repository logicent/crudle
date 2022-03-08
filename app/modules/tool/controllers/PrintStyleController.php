<?php

namespace app\modules\tool\controllers;

use app\controllers\base\BaseCrudController;
use app\modules\tool\models\PrintStyle;
use app\modules\tool\models\PrintStyleSearch;

class PrintStyleController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = PrintStyle::class;
        $this->modelSearchClass = PrintStyleSearch::class;

        return parent::init();
    }
}
