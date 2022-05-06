<?php

namespace crudle\app\setup\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\app\setup\models\PrintStyle;
use crudle\app\setup\models\search\PrintStyleSearch;

class PrintStyleController extends BaseCrudController
{
    public function modelClass(): string
    {
        return PrintStyle::class;
    }

    public function searchModelClass(): string
    {
        return PrintStyleSearch::class;
    }
}
