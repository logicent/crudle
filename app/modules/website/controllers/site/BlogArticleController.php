<?php

namespace app\modules\website\controllers\site;

use app\modules\website\models\BlogArticle;
use app\modules\website\models\BlogArticleSearch;


class BlogArticleController extends SiteController
{
    public function init()
    {
        $this->modelClass = BlogArticle::class;
        $this->modelSearchClass = BlogArticleSearch::class;

        return parent::init();
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
