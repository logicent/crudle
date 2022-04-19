<?php

namespace website\controllers;

use crudle\main\controllers\base\BaseCrudController;
use website\models\BlogArticle;
use website\models\BlogArticleSearch;

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
