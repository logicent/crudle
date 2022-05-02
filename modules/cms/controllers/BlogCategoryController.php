<?php

namespace logicent\cms\controllers;

use crudle\main\controllers\base\BaseCrudController;
use logicent\cms\models\BlogCategory;
use logicent\cms\models\BlogCategorySearch;

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
