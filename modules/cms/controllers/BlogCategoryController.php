<?php

namespace crudle\ext\cms\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\cms\models\BlogCategory;
use crudle\ext\cms\models\BlogCategorySearch;

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
