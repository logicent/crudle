<?php

namespace website\controllers\site;

use crudle\main\controllers\AppController;
use website\models\BlogArticle;
use website\models\BlogArticleSearch;


class BlogArticleController extends AppController
{
    public function init()
    {
        $this->modelClass = BlogArticle::class;
        // $this->modelSearchClass = BlogArticleSearch::class;

        return parent::init();
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
