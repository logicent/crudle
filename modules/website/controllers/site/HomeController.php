<?php

namespace website\controllers\site;

use app\modules\main\controllers\base\BaseController;
use app\modules\main\controllers\SiteController;

class HomeController extends SiteController
{
    public $layout = '@app_main/views/_layouts/site';

    public function actionIndex()
    {
        return $this->render('index');
    }
}
