<?php

namespace app\modules\website\controllers;

use app\controllers\base\BaseCrudController;
use app\modules\website\models\BlogArticle;
use app\modules\website\models\BlogArticleSearch;

/**
 * BlogArticleController for the `BlogArticle` model
 */
class BlogArticleController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = BlogArticle::class;
        $this->modelSearchClass = BlogArticleSearch::class;

        return parent::init();
    }
}
