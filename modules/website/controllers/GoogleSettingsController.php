<?php

namespace website\controllers;

use website\controllers\base\BaseWebSettingsController;

/**
 * GoogleSettingsController for the `GoogleSettingsForm` model
 */
class GoogleSettingsController extends BaseWebSettingsController
{
    /**
     * Renders the index view for the form model
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
