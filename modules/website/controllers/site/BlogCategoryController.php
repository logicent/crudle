<?php

namespace website\controllers\site;

use app\modules\main\controllers\SiteController;
use website\models\BlogCategory;
use website\models\BlogCategorySearch;


class BlogCategoryController extends SiteController
{
    public function init()
    {
        $this->modelClass = BlogCategory::class;
        // $this->modelSearchClass = BlogCategorySearch::class;

        return parent::init();
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
