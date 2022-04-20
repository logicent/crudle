<?php

namespace website\controllers;

use website\controllers\base\BaseWebSettingsController;
use website\models\ContactPage;

class ContactPageController extends BaseWebSettingsController
{
    public function modelClass(): string
    {
        return ContactPage::class;
    }
}
