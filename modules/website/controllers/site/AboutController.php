<?php

namespace website\controllers\site;

use app\modules\main\controllers\SiteController;


class AboutController extends SiteController
{
    public function init()
    {
        $this->modelClass = ContactPage::class;

        return parent::init();
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
