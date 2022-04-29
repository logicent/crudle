<?php

namespace logicent\cms\controllers\site;

use crudle\main\controllers\AppController;
use logicent\cms\models\BlogArticle;
use logicent\cms\models\BlogArticleSearch;


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
