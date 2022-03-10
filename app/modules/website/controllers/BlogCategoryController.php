<?php

namespace app\modules\website\controllers;

use app\controllers\base\BaseCrudController;

/**
 * BlogCategoryController for the `BlogCategory` model
 */
class BlogCategoryController extends BaseCrudController
{
    public function actionIndex()
    {
        $this->sidebar = false;

        return $this->render('index');
    }
}
