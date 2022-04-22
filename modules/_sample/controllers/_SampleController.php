<?php

namespace website\controllers;

use crudle\main\controllers\base\BaseViewController;
use crudle\main\enums\Type_View;

/**
 * _SampleController for the `website` module
 */
class _SampleController extends BaseViewController
{
    /**
     * Renders the default index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    // ViewInterface
    public function defaultViewType()
    {
        return Type_View::Workspace;
    }

    public function showViewSidebar(): bool
    {
        return false;
    }
}
