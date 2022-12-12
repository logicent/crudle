<?php

namespace crudle\ext\web_cms\controllers\cms;

use crudle\app\crud\controllers\CrudController;
use crudle\ext\web_cms\models\BlogWriter;
use crudle\ext\web_cms\models\search\BlogWriterSearch;

/**
 * BlogWriterController for the `BlogWriter` model
 */
class BlogWriterController extends CrudController
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
