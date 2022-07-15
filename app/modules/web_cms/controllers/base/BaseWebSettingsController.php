<?php

namespace crudle\app\web_cms\controllers\base;

use crudle\app\setup\controllers\base\BaseSettingsController;

class BaseWebSettingsController extends BaseSettingsController
{
    public function redirectTo(string $action = null)
    {
        return $this->redirect(['/web-cms']);
    }
}
