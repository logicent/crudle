<?php

namespace crudle\ext\cms\controllers;

use crudle\ext\cms\controllers\base\BaseWebSettingsController;
use crudle\ext\cms\models\ThemeForm;

/**
 * ThemeController for the `ThemeForm` model
 */
class ThemeController extends BaseWebSettingsController
{
    public function modelClass(): string
    {
        return ThemeForm::class;
    }
}
