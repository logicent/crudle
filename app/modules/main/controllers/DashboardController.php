<?php

namespace crudle\main\controllers;

use crudle\main\controllers\base\BaseViewController;
use crudle\main\enums\Type_View;

class DashboardController extends BaseViewController
{
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
