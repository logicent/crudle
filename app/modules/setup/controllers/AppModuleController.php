<?php

namespace crudle\setup\controllers;

use crudle\main\controllers\base\BaseViewController;

class AppModuleController extends BaseViewController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
