<?php

namespace app\modules\website\controllers\site;

use app\modules\website\models\ContactPage;


class ContactController extends SiteController
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
