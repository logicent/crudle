<?php

namespace crudle\ext\web_cms\controllers;

use crudle\app\crud\controllers\CrudController;

class RouteRedirectController extends CrudController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
