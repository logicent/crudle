<?php

namespace crudle\ext\web_cms\controllers\cms;

use crudle\app\crud\controllers\CrudController;
use crudle\ext\web_cms\models\BlogArticle;
use crudle\ext\web_cms\models\search\BlogArticleSearch;

/**
 * BlogArticleController for the `BlogArticle` model
 */
class BlogArticleController extends CrudController
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
