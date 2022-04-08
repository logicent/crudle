<?php

namespace app\modules\main\controllers;

use app\modules\main\controllers\base\BaseViewController;

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
}
