<?php

namespace crudle\ext\dashboard\controllers;

use crudle\app\crud\controllers\CrudController;
use crudle\ext\dashboard\models\Dashboard;
use crudle\ext\dashboard\models\search\DashboardSearch;

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

    // public function showViewSidebar(): bool
    // {
    //     return $this->action->id == 'index';
    // }

    // ListViewInterface
    public function listRouteId(): string
    {
        return '/dashboard/dashboard';
    }

    public function batchActionsMenu(): array
    {
        return [
        ];
    }
}
