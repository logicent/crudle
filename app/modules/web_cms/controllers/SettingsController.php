<?php

namespace crudle\app\web_cms\controllers;

use crudle\app\web_cms\controllers\base\BaseWebSettingsController;
use crudle\app\web_cms\models\WebsiteSettingsForm;

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
