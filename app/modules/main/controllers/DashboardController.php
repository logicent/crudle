<?php

namespace app\modules\main\controllers;

use app\modules\main\controllers\base\BaseViewController;
use app\modules\main\enums\Type_View;

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
    public function currentViewType()
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
