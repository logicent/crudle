<?php

namespace crudle\app\printing\controllers;

use crudle\app\crud\controllers\CrudController;
use crudle\app\printing\models\PrintFormat;
use crudle\app\printing\models\search\PrintFormatSearch;

class PrintFormatController extends CrudController
{
    public function modelClass(): string
    {
        return PrintFormat::class;
    }

    public function searchModelClass(): string
    {
        return PrintFormatSearch::class;
    }
}
