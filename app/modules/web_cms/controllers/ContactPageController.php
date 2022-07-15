<?php

namespace crudle\app\web_cms\controllers;

use crudle\app\web_cms\controllers\base\BaseWebSettingsController;
use crudle\app\web_cms\models\ContactPage;

class ContactPageController extends BaseWebSettingsController
{
    public function modelClass(): string
    {
        return ContactPage::class;
    }
}
