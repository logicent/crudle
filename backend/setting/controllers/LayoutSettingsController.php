<?php

namespace crudle\app\setting\controllers;

use crudle\app\setting\controllers\base\SettingsController;
use crudle\app\setting\forms\LayoutSettingsForm;

class LayoutSettingsController extends SettingsController
{
    public function modelClass(): string
    {
        return LayoutSettingsForm::class;
    }
}
