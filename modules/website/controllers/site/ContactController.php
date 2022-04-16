<?php

namespace website\controllers\site;

use app\modules\main\controllers\AppController;
use website\models\ContactPage;


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
