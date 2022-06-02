<?php

namespace crudle\ext\web_cms\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\web_cms\models\WebForm;
use crudle\ext\web_cms\models\search\WebFormSearch;

/**
 * WebFormController for the `WebForm` model
 */
class WebFormController extends BaseCrudController
{
    public function modelClass(): string
    {
        return WebForm::class;
    }

    public function searchModelClass(): string
    {
        return WebFormSearch::class;
    }
}
