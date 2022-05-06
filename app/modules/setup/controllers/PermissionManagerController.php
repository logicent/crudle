<?php

namespace crudle\app\setup\controllers;

use crudle\app\main\controllers\base\BaseController;

class PermissionManagerController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
