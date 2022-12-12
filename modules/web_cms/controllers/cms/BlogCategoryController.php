<?php

namespace crudle\ext\web_cms\controllers\cms;

use crudle\app\crud\controllers\CrudController;
use crudle\ext\web_cms\models\BlogCategory;
use crudle\ext\web_cms\models\search\BlogCategorySearch;

/**
 * BlogCategoryController for the `BlogCategory` model
 */
class BlogCategoryController extends CrudController
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
