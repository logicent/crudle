<?php

namespace crudle\ext\web_cms\controllers\cms;

use crudle\ext\web_cms\controllers\base\BaseWebSettingsController;
use crudle\ext\web_cms\models\ContactPage;

class ContactPageController extends BaseWebSettingsController
{
    public function modelClass(): string
    {
        return ContactPage::class;
    }
}
