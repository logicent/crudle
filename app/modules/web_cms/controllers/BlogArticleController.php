<?php

namespace crudle\app\web_cms\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\app\web_cms\models\BlogArticle;
use crudle\app\web_cms\models\search\BlogArticleSearch;

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
