<?php

namespace crudle\app\main\controllers;

use crudle\app\main\controllers\base\BaseViewController;
use crudle\app\main\enums\Type_View;
use crudle\app\setup\models\Dashboard;

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
    public function actionIndex($id = null)
    {
        $model = Dashboard::findOne(['route' => $id]);

        if (!$model)
            $model = new Dashboard();

        return $this->render('index', [
            'model' => $model
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
