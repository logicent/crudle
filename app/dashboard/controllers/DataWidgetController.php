<?php

namespace crudle\app\dashboard\controllers;

use crudle\app\main\controllers\base\CrudController;
use crudle\app\main\models\DataWidget;
use crudle\app\main\models\search\DataWidgetSearch;

class DataWidgetController extends CrudController
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
