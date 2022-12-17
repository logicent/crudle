<?php

namespace crudle\app\main\controllers;

use crudle\app\main\controllers\base\ViewController;
use crudle\app\main\enums\Type_View;

class MainController extends ViewController
{
    public function actions()
    {
        return [
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    // ViewInterface
    public function defaultActionViewType()
    {
        return Type_View::Workspace;
    }

    public function showViewSidebar(): bool
    {
        return false;
    }
}
