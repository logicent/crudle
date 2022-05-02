<?php

namespace logicent\cms\controllers;

use logicent\cms\controllers\base\BaseWebSettingsController;

/**
 * ThemeController for the `ThemeForm` model
 */
class ThemeController extends BaseWebSettingsController
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
