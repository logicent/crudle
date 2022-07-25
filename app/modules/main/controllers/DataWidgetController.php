<?php

namespace crudle\app\main\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\app\main\models\DataWidget;
use crudle\app\main\models\search\DataWidgetSearch;

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
