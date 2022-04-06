<?php

namespace website\controllers\site;

use app\modules\main\controllers\SiteController;

class HomeController extends SiteController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
