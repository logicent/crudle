<?php

namespace website\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use website\models\Slideshow;
use website\models\SlideshowSearch;

/**
 * SlideshowController for the `Slideshow` model
 */
class SlideshowController extends BaseCrudController
{
    public function modelClass()
    {
        return Slideshow::class;
    }

    public function searchModelClass()
    {
        return SlideshowSearch::class;
    }
}
