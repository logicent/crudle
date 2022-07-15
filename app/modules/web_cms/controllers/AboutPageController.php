<?php

namespace crudle\app\web_cms\controllers;

use crudle\app\web_cms\controllers\base\BaseWebSettingsController;
use crudle\app\web_cms\models\AboutPage;

class AboutPageController extends BaseWebSettingsController
{
    public function modelClass(): string
    {
        return AboutPage::class;
    }
}
