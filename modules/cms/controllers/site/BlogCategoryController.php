<?php

namespace logicent\cms\controllers\site;

use crudle\main\controllers\AppController;
use logicent\cms\models\BlogCategory;
use logicent\cms\models\BlogCategorySearch;


class BlogCategoryController extends AppController
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
