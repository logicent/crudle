<?php

namespace crudle\ext\cms\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\cms\models\WebPage;
use crudle\ext\cms\models\WebPageSearch;

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
