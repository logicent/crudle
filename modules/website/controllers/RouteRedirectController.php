<?php

namespace website\controllers;

use app\modules\main\controllers\base\BaseCrudController;

class RouteRedirectController extends BaseCrudController
{
    public function actionIndex()
    {
        $this->sidebar = false;

        return $this->render('index');
    }
}
