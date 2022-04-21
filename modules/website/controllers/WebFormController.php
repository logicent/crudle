<?php

namespace website\controllers;

use crudle\main\controllers\base\BaseCrudController;
use website\models\WebForm;
use website\models\WebFormSearch;

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
