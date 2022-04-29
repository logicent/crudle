<?php

namespace logicent\cms\controllers;

use crudle\main\controllers\base\BaseCrudController;
use logicent\cms\models\WebForm;
use logicent\cms\models\WebFormSearch;

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
