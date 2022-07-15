<?php

namespace crudle\app\web_cms\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\app\web_cms\models\Slideshow;
use crudle\app\web_cms\models\search\SlideshowSearch;

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
