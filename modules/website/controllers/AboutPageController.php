<?php

namespace website\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;
use website\models\AboutPage;

class AboutPageController extends BaseSettingsController
{
    public function modelClass(): string
    {
        return AboutPage::class;
    }
}
