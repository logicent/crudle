<?php

namespace app\modules\setup\controllers;

use app\modules\main\controllers\base\BaseController;

/**
 * Setup controller for the `setup` module
 */
class SetupController extends BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->sidebar = false;

        return $this->render('index');
    }
}
