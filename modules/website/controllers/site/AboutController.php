<?php

namespace website\controllers\site;

use crudle\main\controllers\AppController;


class AboutController extends AppController
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
