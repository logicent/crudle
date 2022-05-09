<?php

namespace crudle\ext\web_cms\controllers;

use crudle\ext\web_cms\controllers\base\BaseWebSettingsController;
use crudle\ext\web_cms\models\AboutPage;

class AboutPageController extends BaseWebSettingsController
{
    public function modelClass(): string
    {
        return AboutPage::class;
    }
}
