<?php

namespace website\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;

/**
 * ThemeController for the `ThemeForm` model
 */
class ThemeController extends BaseSettingsController
{
    /**
     * Renders the index view for the model
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
