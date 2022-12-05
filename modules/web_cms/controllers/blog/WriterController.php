<?php

namespace crudle\ext\web_cms\controllers\site;

use crudle\ext\web_cms\models\BlogWriter;
// use crudle\ext\web_cms\models\BlogWriterSearch;


class WriterController extends SiteController
{
    public function actionIndex()
    {
        $authors = BlogWriter::find()->all();

        return $this->render('index', [
                'authors' => $authors
            ]);
    }

    public function actionRead($id)
    {
        $author = BlogWriter::findOne($id);

        if (!$author)
            return $this->render('/site/index');

        return $this->render('read', [
                'author' => $author
            ]);
    }

    public function modelClass(): string
    {
        return BlogWriter::class;
    }
}
