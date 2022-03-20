<?php

namespace app\modules\website\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;
use app\modules\website\models\ContactPage;

class ContactPageController extends BaseSettingsController
{
    public function init()
    {
        $this->modelClass = ContactPage::class;

        return parent::init();
    }
}
