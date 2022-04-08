<?php

namespace app\modules\setup\controllers;

use app\modules\main\controllers\base\BaseViewController;

class AppModuleController extends BaseViewController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
