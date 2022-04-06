<?php

namespace website\controllers\site;

use app\modules\main\controllers\base\BaseController;


class SiteController extends BaseController
{
    public $layout = '//site';

    public function actionIndex()
    {
        return $this->render('index');
    }
}
