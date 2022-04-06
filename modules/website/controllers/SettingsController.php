<?php

namespace website\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;
use website\models\WebsiteSettingsForm;

/**
 * SettingsController for the `WebsiteSettings` model
 */
class SettingsController extends BaseSettingsController
{
    public function init()
    {
        $this->modelClass = WebsiteSettingsForm::class;

        return parent::init();
    }
}
