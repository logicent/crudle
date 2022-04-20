<?php

namespace website\controllers\base;

use crudle\setup\controllers\base\BaseSettingsController;

class BaseWebSettingsController extends BaseSettingsController
{
    public function redirectTo(string $action = null)
    {
        return $this->redirect(['/website']);
    }
}
