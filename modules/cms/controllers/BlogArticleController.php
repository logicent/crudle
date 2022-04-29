<?php

namespace logicent\cms\controllers;

use crudle\main\controllers\base\BaseCrudController;
use logicent\cms\models\BlogArticle;
use logicent\cms\models\BlogArticleSearch;

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
