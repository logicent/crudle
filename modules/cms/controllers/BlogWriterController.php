<?php

namespace logicent\cms\controllers;

use crudle\main\controllers\base\BaseCrudController;
use logicent\cms\models\BlogWriter;
use logicent\cms\models\BlogWriterSearch;

/**
 * BlogWriterController for the `BlogWriter` model
 */
class BlogWriterController extends BaseCrudController
{
    public function modelClass(): string
    {
        return BlogWriter::class;
    }

    public function searchModelClass(): string
    {
        return BlogWriterSearch::class;
    }
}
