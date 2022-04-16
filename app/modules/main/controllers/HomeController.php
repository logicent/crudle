<?php

namespace app\modules\main\controllers;

use app\modules\main\controllers\base\BaseViewController;
use app\modules\main\enums\Type_View;

class HomeController extends BaseViewController
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

    public function showViewHeader(): bool
    {
        return false;
    }

    public function showViewSidebar(): bool
    {
        return false;
    }
}
