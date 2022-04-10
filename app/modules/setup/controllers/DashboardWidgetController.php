<?php

namespace app\modules\setup\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use app\modules\setup\models\DashboardWidget;
use app\modules\setup\models\DashboardWidgetSearch;

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
