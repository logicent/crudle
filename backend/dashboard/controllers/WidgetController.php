<?php

namespace crudle\app\dashboard\controllers;

use crudle\app\crud\controllers\CrudController;
use crudle\app\dashboard\models\DataWidget;
use crudle\app\dashboard\models\search\DataWidgetSearch;

class WidgetController extends CrudController
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
