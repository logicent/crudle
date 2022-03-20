<?php

namespace app\modules\website\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;
use app\modules\website\models\WebsiteSettingsForm;

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
