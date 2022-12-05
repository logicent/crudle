<?php

namespace crudle\app\dashboard\controllers;

use crudle\app\main\controllers\base\CrudController;
use crudle\app\dashboard\models\Dashboard;
use crudle\app\main\models\search\DashboardSearch;

class DashboardController extends CrudController
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
