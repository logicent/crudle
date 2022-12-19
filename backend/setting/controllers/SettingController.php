<?php

namespace crudle\app\setting\controllers;

use crudle\app\main\controllers\base\ViewController;
use crudle\app\main\enums\Type_View;

/**
 * Setting controller for the `setting` module
 */
class SettingController extends ViewController
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
