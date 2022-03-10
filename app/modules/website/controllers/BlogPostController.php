<?php

namespace app\modules\website\controllers;

use app\controllers\base\BaseCrudController;

/**
 * BlogPostController for the `BlogPost` model
 */
class BlogPostController extends BaseCrudController
{
    public function actionIndex()
    {
        $this->sidebar = false;

        return $this->render('index');
    }
}
