<?php

namespace crudle\setup\controllers;

use crudle\main\controllers\base\BaseCrudController;
use crudle\setup\models\PrintFormat;
use crudle\setup\models\PrintFormatSearch;

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
