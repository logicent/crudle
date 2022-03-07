<?php

namespace app\modules\tool\controllers;

use app\controllers\base\BaseController;

class ToolController extends BaseController
{
    public function actionIndex()
    {
        $this->sidebar = false;
    
        return $this->render('index', [
        ]);
    }
}
