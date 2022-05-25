<?php

namespace crudle\app\setup\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\app\setup\models\DataWidget;
use crudle\app\setup\models\search\DataWidgetSearch;

class DataWidgetController extends BaseCrudController
{
    public function modelClass(): string
    {
        return DataWidget::class;
    }

    public function searchModelClass(): string
    {
        return DataWidgetSearch::class;
    }
}
