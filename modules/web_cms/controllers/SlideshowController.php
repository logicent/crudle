<?php

namespace crudle\ext\web_cms\controllers;

use crudle\app\crud\controllers\CrudController;
use crudle\ext\web_cms\models\Slideshow;
use crudle\ext\web_cms\models\search\SlideshowSearch;

/**
 * SlideshowController for the `Slideshow` model
 */
class SlideshowController extends CrudController
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
