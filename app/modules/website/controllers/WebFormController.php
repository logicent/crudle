<?php

namespace app\modules\website\controllers;

use app\controllers\base\BaseCrudController;

/**
 * WebFormController for the `WebForm` model
 */
class WebFormController extends BaseCrudController
{
    public function actionIndex()
    {
        $this->sidebar = false;

        return $this->render('index');
    }
}
