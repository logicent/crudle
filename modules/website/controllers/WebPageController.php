<?php

namespace website\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use website\models\WebPage;
use website\models\WebPageSearch;

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
