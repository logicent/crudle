<?php

namespace website\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use website\models\BlogWriter;
use website\models\BlogWriterSearch;

/**
 * BlogWriterController for the `BlogWriter` model
 */
class BlogWriterController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = BlogWriter::class;
        $this->modelSearchClass = BlogWriterSearch::class;

        return parent::init();
    }
}
