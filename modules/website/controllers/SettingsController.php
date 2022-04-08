<?php

namespace website\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;
use website\models\WebsiteSettingsForm;

/**
 * SettingsController for the `WebsiteSettings` model
 */
class SettingsController extends BaseSettingsController
{
    public function modelClass()
    {
        return WebsiteSettingsForm::class;
    }
}
