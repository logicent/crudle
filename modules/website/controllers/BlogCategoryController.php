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
    public function init()
    {
        $this->modelClass = BlogCategory::class;
        $this->modelSearchClass = BlogCategorySearch::class;

        return parent::init();
    }
}
