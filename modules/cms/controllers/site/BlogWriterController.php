<?php

namespace logicent\cms\controllers\site;

use crudle\main\controllers\AppController;
use logicent\cms\models\BlogWriter;
use logicent\cms\models\BlogWriterSearch;


class BlogWriterController extends AppController
{
    public function init()
    {
        $this->modelClass = BlogWriter::class;
        // $this->modelSearchClass = BlogWriterSearch::class;

        return parent::init();
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
