<?php

namespace app\modules\website\controllers\site;

use app\modules\website\models\BlogWriter;
use app\modules\website\models\BlogWriterSearch;


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
