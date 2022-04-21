<?php

namespace website\controllers;

use website\controllers\base\BaseWebSettingsController;
use website\models\AboutPage;

class AboutPageController extends BaseWebSettingsController
{
    public function modelClass(): string
    {
        return AboutPage::class;
    }
}
