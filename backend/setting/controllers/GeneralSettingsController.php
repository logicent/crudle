<?php

namespace crudle\app\setting\controllers;

use crudle\app\setting\controllers\base\SettingsController;
use crudle\app\setting\forms\GeneralSettingsForm;

class GeneralSettingsController extends SettingsController
{
    public function modelClass(): string
    {
        return GeneralSettingsForm::class;
    }
}
