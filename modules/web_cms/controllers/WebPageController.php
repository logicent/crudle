<?php

namespace crudle\ext\web_cms\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\web_cms\models\WebPage;
use crudle\ext\web_cms\models\search\WebPageSearch;

/**
 * WebPageController for the `WebPage` model
 */
class WebPageController extends BaseCrudController
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
