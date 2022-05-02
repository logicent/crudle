<?php

namespace logicent\cms\controllers;

use logicent\cms\controllers\base\BaseWebSettingsController;
use logicent\cms\models\WebsiteSettingsForm;

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
