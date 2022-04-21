<?php

namespace crudle\setup\controllers;

use crudle\main\controllers\base\BaseCrudController;
use crudle\setup\models\DashboardWidget;
use crudle\setup\models\DashboardWidgetSearch;

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
