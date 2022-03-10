<?php

namespace app\modules\website\controllers;

use app\controllers\base\BaseCrudController;

class RouteRedirectController extends BaseCrudController
{
    public function actionIndex()
    {
        $this->sidebar = false;

        return $this->render('index');
    }
}
