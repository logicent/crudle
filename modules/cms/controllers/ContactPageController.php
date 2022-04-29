<?php

namespace logicent\cms\controllers;

use logicent\cms\controllers\base\BaseWebSettingsController;
use logicent\cms\models\ContactPage;

class ContactPageController extends BaseWebSettingsController
{
    public function modelClass(): string
    {
        return ContactPage::class;
    }
}
