<?php

namespace crudle\ext\web_cms\controllers;

use crudle\app\list_view\controllers\ListViewController;
use crudle\ext\web_cms\models\BlogArticle;
use crudle\ext\web_cms\models\search\BlogArticleSearch;

/**
 * BlogArticleController for the `BlogArticle` model
 */
class BlogArticleController extends ListViewController
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
