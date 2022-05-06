<?php

namespace crudle\app\setup\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\app\setup\models\PrintFormat;
use crudle\app\setup\models\search\PrintFormatSearch;

class PrintFormatController extends BaseCrudController
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
