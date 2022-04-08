<?php

namespace app\modules\setup\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use app\modules\setup\models\PrintFormat;
use app\modules\setup\models\PrintFormatSearch;

class PrintFormatController extends BaseCrudController
{
    public function modelClass()
    {
        return PrintFormat::class;
    }

    public function searchModelClass()
    {
        return PrintFormatSearch::class;
    }
}
