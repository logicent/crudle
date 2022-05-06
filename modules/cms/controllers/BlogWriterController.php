<?php

namespace crudle\ext\cms\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\cms\models\BlogWriter;
use crudle\ext\cms\models\BlogWriterSearch;

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
