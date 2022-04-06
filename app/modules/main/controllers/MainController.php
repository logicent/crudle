<?php

namespace app\modules\main\controllers;

use app\modules\main\controllers\base\BaseController;

class MainController extends BaseController
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
