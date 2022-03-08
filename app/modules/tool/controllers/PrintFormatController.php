<?php

namespace app\modules\tool\controllers;

use app\controllers\base\BaseCrudController;
use app\modules\tool\models\PrintFormat;
use app\modules\tool\models\PrintFormatSearch;

class PrintFormatController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = PrintFormat::class;
        $this->modelSearchClass = PrintFormatSearch::class;

        return parent::init();
    }
}
