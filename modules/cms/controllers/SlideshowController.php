<?php

namespace logicent\cms\controllers;

use crudle\main\controllers\base\BaseCrudController;
use logicent\cms\models\Slideshow;
use logicent\cms\models\SlideshowSearch;

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
