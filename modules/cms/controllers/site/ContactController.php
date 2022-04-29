<?php

namespace logicent\cms\controllers\site;

use crudle\main\controllers\AppController;
use logicent\cms\models\ContactPage;


class ContactController extends AppController
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
