<?php

namespace crudle\ext\web_cms\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\web_cms\models\BlogCategory;
use crudle\ext\web_cms\models\search\BlogCategorySearch;

/**
 * BlogCategoryController for the `BlogCategory` model
 */
class BlogCategoryController extends BaseCrudController
{
    public function modelClass(): string
    {
        return BlogCategory::class;
    }

    public function searchModelClass(): string
    {
        return BlogCategorySearch::class;
    }
}
