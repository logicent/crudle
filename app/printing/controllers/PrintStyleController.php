<?php

namespace crudle\app\printing\controllers;

use crudle\app\crud\controllers\CrudController;
use crudle\app\printing\models\PrintStyle;
use crudle\app\printing\models\search\PrintStyleSearch;

class PrintStyleController extends CrudController
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
