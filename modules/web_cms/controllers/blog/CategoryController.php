<?php

namespace crudle\ext\web_cms\controllers\site;

use crudle\ext\web_cms\models\BlogCategory;
// use crudle\ext\web_cms\models\BlogCategorySearch;


class CategoryController extends SiteController
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
