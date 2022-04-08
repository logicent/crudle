<?php

namespace app\modules\setup\controllers;

use app\modules\main\controllers\base\BaseViewController;
use app\modules\main\enums\Type_View;

/**
 * Setup controller for the `setup` module
 */
class SetupController extends BaseViewController
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
