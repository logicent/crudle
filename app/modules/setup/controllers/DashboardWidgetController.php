<?php

namespace crudle\app\setup\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\app\setup\models\DashboardWidget;
use crudle\app\setup\models\search\DashboardWidgetSearch;

class DashboardWidgetController extends BaseCrudController
{
    public function modelClass(): string
    {
        return DashboardWidget::class;
    }

    public function searchModelClass(): string
    {
        return DashboardWidgetSearch::class;
    }
}
