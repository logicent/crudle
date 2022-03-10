<?php

namespace app\modules\website\controllers;

use app\controllers\base\BaseCrudController;

/**
 * WebPageController for the `WebPage` model
 */
class WebPageController extends BaseCrudController
{
    public function actionIndex()
    {
        $this->sidebar = false;

        return $this->render('index');
    }
}
