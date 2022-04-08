<?php

namespace website\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use website\models\WebForm;
use website\models\WebFormSearch;

/**
 * WebFormController for the `WebForm` model
 */
class WebFormController extends BaseCrudController
{
    public function modelClass()
    {
        return WebForm::class;
    }

    public function searchModelClass()
    {
        return WebFormSearch::class;
    }
}
