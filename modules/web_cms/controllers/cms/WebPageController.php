<?php

namespace crudle\ext\web_cms\controllers\cms;

use crudle\app\crud\controllers\CrudController;
use crudle\ext\web_cms\models\WebPage;
use crudle\ext\web_cms\models\search\WebPageSearch;

/**
 * WebPageController for the `WebPage` model
 */
class WebPageController extends CrudController
{
    public function modelClass(): string
    {
        return WebPage::class;
    }

    public function searchModelClass(): string
    {
        return WebPageSearch::class;
    }
}
