<?php

namespace app\modules\integration\controllers;

use app\controllers\base\BaseController;

class IntegrationController extends BaseController
{
    public function actionIndex()
    {
        $this->sidebar = false;

        return $this->render('index', [
        ]);
    }
}
