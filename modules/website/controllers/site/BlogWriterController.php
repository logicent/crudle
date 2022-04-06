<?php

namespace website\controllers\site;

use website\models\BlogWriter;
use website\models\BlogWriterSearch;


class BlogWriterController extends SiteController
{
    public function init()
    {
        $this->modelClass = BlogWriter::class;
        $this->modelSearchClass = BlogWriterSearch::class;

        return parent::init();
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
