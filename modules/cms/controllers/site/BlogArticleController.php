<?php

namespace logicent\cms\controllers\site;

use logicent\cms\models\BlogArticle;
// use logicent\cms\models\BlogArticleSearch;


class BlogArticleController extends SiteController
{
    public function actionIndex()
    {
        $articles = BlogArticle::find()->all();

        return $this->render('index', [
                'articles' => $articles
            ]);
    }

    public function actionRead($id)
    {
        $article = BlogArticle::findOne($id);

        if (!$article)
            return $this->render('/site/index');

        return $this->render('read', [
                'article' => $article
            ]);
    }

    public function modelClass(): string
    {
        return BlogArticle::class;
    }
}
