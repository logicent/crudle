<?php

namespace website\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;

/**
 * GoogleSettingsController for the `GoogleSettingsForm` model
 */
class GoogleSettingsController extends BaseSettingsController
{
    /**
     * Renders the index view for the form model
     * @return string
     */
    public function actionIndex()
    {
        $this->sidebar = false;

        return $this->render('index');
    }
}
