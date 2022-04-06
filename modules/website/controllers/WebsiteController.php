<?php

namespace website\controllers;

use app\modules\main\controllers\base\BaseCrudController;

/**
 * WebsiteController for the `website` module
 */
class WebsiteController extends BaseCrudController
{
    /**
     * Renders the default index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->sidebar = false;

        return $this->render('index');
    }
}
