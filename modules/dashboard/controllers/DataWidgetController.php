<?php

namespace crudle\ext\dashboard\controllers;

use crudle\app\crud\controllers\CrudController;
use crudle\ext\dashboard\models\DataWidget;
use crudle\ext\dashboard\models\search\DataWidgetSearch;

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
