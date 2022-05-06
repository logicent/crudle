<?php

namespace crudle\ext\cms\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\cms\models\Slideshow;
use crudle\ext\cms\models\SlideshowSearch;

/**
 * SlideshowController for the `Slideshow` model
 */
class SlideshowController extends BaseCrudController
{
    public function modelClass(): string
    {
        return Slideshow::class;
    }

    public function searchModelClass(): string
    {
        return SlideshowSearch::class;
    }
}
