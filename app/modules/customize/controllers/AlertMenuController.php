<?php

namespace app\modules\customize\controllers;

use app\controllers\base\BaseController;

class AlertMenuController extends BaseController
{
    public function actionIndex()
    {
        $this->sidebar = false;

        return $this->render('index');
    }
}