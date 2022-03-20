<?php

namespace app\modules\website\controllers;

use app\controllers\base\BaseCrudController;
use app\modules\website\models\BlogWriter;
use app\modules\website\models\BlogWriterSearch;

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
