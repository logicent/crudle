<?php

namespace crudle\ext\web_cms\controllers\blog;

use crudle\ext\web_cms\controllers\site\SiteController;
use crudle\ext\web_cms\models\BlogArticle;
// use crudle\ext\web_cms\models\BlogArticleSearch;

class ArticleController extends SiteController
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
