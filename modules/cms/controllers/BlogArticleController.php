<?php

namespace crudle\ext\cms\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\cms\models\BlogArticle;
use crudle\ext\cms\models\BlogArticleSearch;

/**
 * BlogArticleController for the `BlogArticle` model
 */
class BlogArticleController extends BaseCrudController
{
    public function modelClass(): string
    {
        return BlogArticle::class;
    }

    public function searchModelClass(): string
    {
        return BlogArticleSearch::class;
    }
}
