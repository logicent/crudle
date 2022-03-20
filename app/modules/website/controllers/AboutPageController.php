<?php

namespace app\modules\website\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;
use app\modules\website\models\AboutPage;

class AboutPageController extends BaseSettingsController
{
    public function init()
    {
        $this->modelClass = AboutPage::class;

        return parent::init();
    }
}
