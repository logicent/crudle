<?php

namespace app\modules\main\controllers;

use app\modules\main\controllers\base\BaseController;

class DashboardController extends BaseController
{
    /**
     * Renders the index view for the controller
     * @return string
     */
    public function actionIndex()
    {
        $this->sidebar = false;

        $stats = [];

        return $this->render('index', [
            'stats' => $stats
        ]);
    }
}
