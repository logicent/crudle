<?php

namespace crudle\app\setup\controllers;

use crudle\app\main\controllers\base\CrudController;
use crudle\app\setup\models\PrintFormat;
use crudle\app\setup\models\search\PrintFormatSearch;

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
