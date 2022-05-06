<?php

namespace crudle\ext\cms\controllers;

use crudle\ext\cms\controllers\base\BaseWebSettingsController;
use crudle\ext\cms\models\AboutPage;

class AboutPageController extends BaseWebSettingsController
{
    public function modelClass(): string
    {
        return AboutPage::class;
    }
}
