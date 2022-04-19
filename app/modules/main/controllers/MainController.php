<?php

namespace crudle\main\controllers;

use crudle\main\controllers\base\BaseViewController;
use crudle\main\enums\Type_View;

class MainController extends BaseViewController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    // ViewInterface
    public function currentViewType()
    {
        return Type_View::Workspace;
    }

    public function showViewSidebar(): bool
    {
        return false;
    }
}
