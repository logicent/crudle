<?php

namespace logicent\cms\controllers\site;

use logicent\cms\models\BlogCategory;
// use logicent\cms\models\BlogCategorySearch;


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
