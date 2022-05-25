<?php

namespace crudle\app\setup\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\app\setup\models\Dashboard;
use crudle\app\setup\models\search\DashboardSearch;

class DashboardController extends BaseCrudController
{
    public function modelClass(): string
    {
        return Dashboard::class;
    }

    public function searchModelClass(): string
    {
        return DashboardSearch::class;
    }
}
