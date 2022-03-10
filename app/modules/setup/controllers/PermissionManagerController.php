<?php

namespace app\modules\setup\controllers;

use app\controllers\base\BaseController;

class PermissionManagerController extends BaseController
{
    public function actionIndex()
    {
        $this->sidebar = false;

        return $this->render('index');
    }
}
