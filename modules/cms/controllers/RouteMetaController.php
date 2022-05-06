<?php

namespace crudle\ext\cms\controllers;

use crudle\app\main\controllers\base\BaseCrudController;

class RouteMetaController extends BaseCrudController
{
    public function actions()
    {
        return [
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
