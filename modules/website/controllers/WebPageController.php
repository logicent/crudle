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
    public function modelClass()
    {
        return WebPage::class;
    }

    public function searchModelClass()
    {
        return WebPageSearch::class;
    }
}
