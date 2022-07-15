<?php

namespace crudle\app\web_cms\controllers\site;

use crudle\app\web_cms\models\BlogCategory;
// use crudle\app\web_cms\models\BlogCategorySearch;


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
