<?php

namespace logicent\cms\controllers;

use crudle\main\controllers\base\BaseCrudController;

class RouteRedirectController extends BaseCrudController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
