<?php

namespace website\controllers;

use website\controllers\base\BaseWebSettingsController;
use website\models\WebsiteSettingsForm;

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
