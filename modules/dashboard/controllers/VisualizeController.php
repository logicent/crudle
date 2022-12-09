<?php

namespace crudle\ext\dashboard\controllers;

use crudle\app\main\controllers\base\ViewController;
use crudle\app\main\enums\Type_View;
use crudle\ext\dashboard\models\Dashboard;

class VisualizeController extends ViewController
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
