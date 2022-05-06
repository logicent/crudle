<?php

namespace crudle\ext\cms\controllers\site;

use crudle\ext\cms\models\WebPage;


class PageController extends SiteController
{
    public function actionIndex()
    {
        // $this->model = $this->findModel();

        return $this->render('index');
    }

    public function modelClass(): string
    {
        return WebPage::class;
    }
}
