<?php

namespace crudle\ext\web_cms\controllers\base;

use crudle\app\setup\controllers\base\BaseSettingsController;

class BaseWebSettingsController extends BaseSettingsController
{
    public function redirectTo(string $action = null)
    {
        return $this->redirect(['/cms']);
    }
}
