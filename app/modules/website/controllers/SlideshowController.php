<?php

namespace app\modules\website\controllers;

use app\controllers\base\BaseCrudController;

/**
 * SlideshowController for the `Slideshow` model
 */
class SlideshowController extends BaseCrudController
{
    public function actionIndex()
    {
        $this->sidebar = false;

        return $this->render('index');
    }
}
