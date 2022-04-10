<?php

namespace website\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;
use website\models\ContactPage;

class ContactPageController extends BaseSettingsController
{
    public function modelClass(): string
    {
        return ContactPage::class;
    }
}
