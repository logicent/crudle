<?php

namespace website\controllers;

use crudle\main\controllers\base\BaseCrudController;

class RouteMetaController extends BaseCrudController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
