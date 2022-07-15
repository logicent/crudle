<?php

namespace crudle\app\web_cms\controllers;

use crudle\app\web_cms\controllers\base\BaseWebSettingsController;
use crudle\app\web_cms\models\ThemeForm;

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
