<?php

namespace app\modules\customize\controllers;

use app\controllers\base\BaseController;

/**
 * Customize controller for the `customize` module
 */
class CustomizeController extends BaseController
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
