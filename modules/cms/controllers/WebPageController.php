<?php

namespace logicent\cms\controllers;

use crudle\main\controllers\base\BaseCrudController;
use logicent\cms\models\WebPage;
use logicent\cms\models\WebPageSearch;

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
