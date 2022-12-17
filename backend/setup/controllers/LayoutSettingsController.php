<?php

namespace crudle\app\setup\controllers;

use crudle\app\setup\controllers\base\BaseSettingsController;
use crudle\app\setup\forms\LayoutSettingsForm;

class LayoutSettingsController extends BaseSettingsController
{
    public function modelClass(): string
    {
        return LayoutSettingsForm::class;
    }
}
