<?php

namespace app\modules\website\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;

/**
 * SettingsController for the `WebsiteSettings` model
 */
class SettingsController extends BaseSettingsController
{
    public function actionIndex()
    {
        $this->sidebar = false;

        return $this->render('index');
    }
}
