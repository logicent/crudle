<?php

namespace crudle\ext\cms\controllers;

use crudle\app\main\controllers\base\BaseCrudController;

class RouteRedirectController extends BaseCrudController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
