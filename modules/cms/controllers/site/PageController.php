<?php

namespace logicent\cms\controllers\site;

use logicent\cms\models\WebPage;


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
