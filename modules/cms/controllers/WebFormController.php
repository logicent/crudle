<?php

namespace crudle\ext\cms\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\cms\models\WebForm;
use crudle\ext\cms\models\WebFormSearch;

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
