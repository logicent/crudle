<?php

namespace crudle\ext\web_cms\controllers;

use crudle\app\crud\controllers\CrudController;
use crudle\ext\web_cms\models\WebForm;
use crudle\ext\web_cms\models\search\WebFormSearch;

/**
 * WebFormController for the `WebForm` model
 */
class WebFormController extends CrudController
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
