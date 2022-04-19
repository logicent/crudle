<?php

namespace crudle\setup\controllers;

use crudle\main\controllers\base\BaseController;

class PermissionManagerController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
