<?php

namespace crudle\ext\web_cms\controllers;

use crudle\app\list_view\controllers\ListViewController;
use crudle\ext\web_cms\models\BlogWriter;
use crudle\ext\web_cms\models\search\BlogWriterSearch;

/**
 * BlogWriterController for the `BlogWriter` model
 */
class BlogWriterController extends ListViewController
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
