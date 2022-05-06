<?php

namespace crudle\app\main\controllers;

use crudle\app\main\controllers\base\BaseViewController;
use crudle\app\main\enums\Type_View;

class DashboardController extends BaseViewController
{
    public function actions()
    {
        return [
        ];
    }

    /**
     * Renders the index view for the controller
     * @return string
     */
    public function actionIndex()
    {
        $stats = [];

        return $this->render('index', [
            'stats' => $stats
        ]);
    }

    // ViewInterface
    public function defaultViewType()
    {
        return Type_View::Dashboard;
    }

    public function showViewHeader(): bool
    {
        return false;
    }

    public function showViewSidebar(): bool
    {
        return false;
    }
}
