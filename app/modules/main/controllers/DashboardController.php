<?php

namespace crudle\app\main\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\app\main\models\Dashboard;
use crudle\app\main\models\search\DashboardSearch;

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
