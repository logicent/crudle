<?php

namespace crudle\app\setting\controllers;

use crudle\app\setting\forms\DeveloperSettingsForm;
use crudle\app\setting\controllers\base\SettingsController;

class DeveloperSettingsController extends SettingsController
{
    public function modelClass(): string
    {
        return DeveloperSettingsForm::class;
    }
}
