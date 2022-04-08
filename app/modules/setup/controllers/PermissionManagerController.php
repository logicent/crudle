<?php

namespace app\modules\setup\controllers;

use app\modules\main\controllers\base\BaseController;

class PermissionManagerController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
