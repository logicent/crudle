<?php

namespace crudle\ext\web_cms\controllers\cms;

use crudle\ext\web_cms\controllers\base\BaseWebSettingsController;
use crudle\ext\web_cms\models\ThemeForm;

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
