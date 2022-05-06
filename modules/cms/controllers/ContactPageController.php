<?php

namespace crudle\ext\cms\controllers;

use crudle\ext\cms\controllers\base\BaseWebSettingsController;
use crudle\ext\cms\models\ContactPage;

class ContactPageController extends BaseWebSettingsController
{
    public function modelClass(): string
    {
        return ContactPage::class;
    }
}
