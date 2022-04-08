<?php

namespace app\modules\setup\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use app\modules\setup\models\PrintStyle;
use app\modules\setup\models\PrintStyleSearch;

class PrintStyleController extends BaseCrudController
{
    public function modelClass()
    {
        return PrintStyle::class;
    }

    public function searchModelClass()
    {
        return PrintStyleSearch::class;
    }
}
