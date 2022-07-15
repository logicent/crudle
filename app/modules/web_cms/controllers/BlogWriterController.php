<?php

namespace crudle\app\web_cms\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\app\web_cms\models\BlogWriter;
use crudle\app\web_cms\models\search\BlogWriterSearch;

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
