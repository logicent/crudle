<?php

namespace website\controllers;

use crudle\setup\controllers\base\BaseSettingsController;
use website\models\WebsiteSettingsForm;

/**
 * SettingsController for the `WebsiteSettings` model
 */
class SettingsController extends BaseSettingsController
{
    public function modelClass(): string
    {
        return WebsiteSettingsForm::class;
    }
}
