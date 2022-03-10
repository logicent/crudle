<?php

namespace app\modules\website\controllers;

use app\controllers\base\BaseCrudController;

class FooterNavController extends BaseCrudController
{
    public function actionIndex()
    {
        $this->sidebar = false;

        return $this->render('index');
    }
}
