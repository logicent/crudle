<?php

namespace crudle\app\dashboard\controllers;

use crudle\app\main\controllers\base\ViewController;
use crudle\app\main\enums\Type_View;
use crudle\app\dashboard\models\Dashboard;

class DashboardsController extends ViewController
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
    public function defaultActionViewType()
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
