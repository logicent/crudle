<?php

namespace app\modules\customize\controllers;

use app\controllers\base\BaseController;

class ModuleDefController extends BaseController
{
    public function actionIndex()
    {
        $this->sidebar = false;

        return $this->render('index');
    }
}