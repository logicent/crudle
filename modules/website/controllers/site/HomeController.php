<?php

namespace website\controllers\site;

use app\modules\main\controllers\base\BaseController;

class HomeController extends BaseController
{
    public $layout = '@app_main/views/_layouts/site';

    public function actionIndex()
    {
        return $this->render('index');
    }
}
