<?php

namespace crudle\ext\web_cms\controllers\base;

use crudle\app\setting\controllers\base\SettingsController;

class BaseWebSettingsController extends SettingsController
{
    public function redirectTo(string $action = null)
    {
        return $this->redirect(['/web-cms']);
    }

    public function showViewSidebar(): bool
    {
        return false;
    }
}
