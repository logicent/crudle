<?php

namespace website\controllers;

use crudle\main\controllers\base\BaseCrudController;
use website\models\BlogCategory;
use website\models\BlogCategorySearch;

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
