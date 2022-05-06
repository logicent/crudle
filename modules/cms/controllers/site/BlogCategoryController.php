<?php

namespace crudle\ext\cms\controllers\site;

use crudle\ext\cms\models\BlogCategory;
// use crudle\ext\cms\models\BlogCategorySearch;


class BlogCategoryController extends SiteController
{
    public function actionIndex()
    {
        $categories = BlogCategory::find()->all();

        return $this->render('index', [
                'categories' => $categories
            ]);
    }

    public function actionRead($id)
    {
        $category = BlogCategory::findOne($id);

        if (!$category)
            return $this->render('/site/index');

        return $this->render('read', [
                'category' => $category
            ]);
    }

    public function modelClass(): string
    {
        return BlogCategory::class;
    }
}
