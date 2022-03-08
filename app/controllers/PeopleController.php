<?php

namespace app\controllers;

use app\controllers\base\BaseCrudController;

class PeopleController extends BaseCrudController
{
    public function actionIndex()
    {
        $this->sidebar = false;

        return $this->render('index');
    }
}
