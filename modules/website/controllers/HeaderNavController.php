<?php

namespace website\controllers;

use crudle\main\controllers\base\BaseCrudController;

class HeaderNavController extends BaseCrudController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
