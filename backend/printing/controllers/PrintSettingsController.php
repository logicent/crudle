<?php

namespace crudle\app\printing\controllers;

use crudle\app\setting\controllers\base\SettingsController;
use crudle\app\printing\forms\PrintSettingsForm;

class PrintSettingsController extends SettingsController
{
    public function modelClass(): string
    {
        return PrintSettingsForm::class;
    }
}
