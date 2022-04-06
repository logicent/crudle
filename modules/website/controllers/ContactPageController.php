<?php

namespace website\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;
use website\models\ContactPage;

class ContactPageController extends BaseSettingsController
{
    public function init()
    {
        $this->modelClass = ContactPage::class;

        return parent::init();
    }
}
