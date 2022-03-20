<?php

namespace app\modules\website\controllers;

use app\controllers\base\BaseCrudController;
use app\modules\website\models\Slideshow;
use app\modules\website\models\SlideshowSearch;

/**
 * SlideshowController for the `Slideshow` model
 */
class SlideshowController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = Slideshow::class;
        $this->modelSearchClass = SlideshowSearch::class;

        return parent::init();
    }
}
