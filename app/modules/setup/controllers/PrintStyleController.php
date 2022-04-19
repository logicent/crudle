<?php

namespace crudle\setup\controllers;

use crudle\main\controllers\base\BaseCrudController;
use crudle\setup\models\PrintStyle;
use crudle\setup\models\PrintStyleSearch;

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
