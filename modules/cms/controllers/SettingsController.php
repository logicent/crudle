<?php

namespace crudle\ext\cms\controllers;

use crudle\ext\cms\controllers\base\BaseWebSettingsController;
use crudle\ext\cms\models\WebsiteSettingsForm;

/**
 * SettingsController for the `WebsiteSettings` model
 */
class SettingsController extends BaseWebSettingsController
{
    public function modelClass(): string
    {
        return WebsiteSettingsForm::class;
    }
}
