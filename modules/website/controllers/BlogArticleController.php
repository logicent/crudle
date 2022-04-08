<?php

namespace website\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use website\models\BlogArticle;
use website\models\BlogArticleSearch;

/**
 * BlogArticleController for the `BlogArticle` model
 */
class BlogArticleController extends BaseCrudController
{
    public function modelClass()
    {
        return BlogArticle::class;
    }

    public function searchModelClass()
    {
        return BlogArticleSearch::class;
    }
}
