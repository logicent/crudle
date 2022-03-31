<?php

namespace app\modules\website\controllers\site;

use app\controllers\base\BaseController;


class SiteController extends BaseController
{
    public $layout = '//site';

    public function actionIndex()
    {
        return $this->render('index');
    }
}
