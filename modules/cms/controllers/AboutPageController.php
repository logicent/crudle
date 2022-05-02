<?php

namespace logicent\cms\controllers;

use logicent\cms\controllers\base\BaseWebSettingsController;
use logicent\cms\models\AboutPage;

class AboutPageController extends BaseWebSettingsController
{
    public function modelClass(): string
    {
        return AboutPage::class;
    }
}
