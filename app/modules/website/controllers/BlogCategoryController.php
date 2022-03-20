<?php

namespace app\modules\website\controllers;

use app\controllers\base\BaseCrudController;
use app\modules\website\models\BlogCategory;
use app\modules\website\models\BlogCategorySearch;

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
