<?php

namespace logicent\cms\controllers\site;

use logicent\cms\models\BlogWriter;
// use logicent\cms\models\BlogWriterSearch;


class BlogWriterController extends SiteController
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
