<?php

namespace app\modules\website\controllers\site;

use app\modules\website\models\BlogCategory;
use app\modules\website\models\BlogCategorySearch;


class BlogCategoryController extends SiteController
{
    public function init()
    {
        $this->modelClass = BlogCategory::class;
        $this->modelSearchClass = BlogCategorySearch::class;

        return parent::init();
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
