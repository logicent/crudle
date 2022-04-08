<?php

namespace website\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use website\models\BlogCategory;
use website\models\BlogCategorySearch;

/**
 * BlogCategoryController for the `BlogCategory` model
 */
class BlogCategoryController extends BaseCrudController
{
    public function modelClass()
    {
        return BlogCategory::class;
    }

    public function searchModelClass()
    {
        return BlogCategorySearch::class;
    }
}
