<?php

namespace crudle\ext\cms\controllers;

use crudle\app\main\controllers\base\BaseViewController;
use crudle\app\main\enums\Type_View;

/**
 * CmsController for the `cms` module
 */
class CmsController extends BaseViewController
{
    public function actions()
    {
        return [
        ];
    }

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
