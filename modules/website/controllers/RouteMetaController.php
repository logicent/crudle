<?php

namespace website\controllers;

use app\modules\main\controllers\base\BaseCrudController;

class RouteMetaController extends BaseCrudController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
