<?php

namespace website\controllers\site;

use crudle\main\controllers\base\BaseController;
use crudle\main\controllers\AppController;

class HomeController extends AppController
{
    public $layout = '@app_main/views/_layouts/site';

    public function actionIndex()
    {
        return $this->render('index');
    }
}
