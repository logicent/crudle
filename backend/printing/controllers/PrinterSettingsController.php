<?php

namespace crudle\app\printing\controllers;

use crudle\app\setting\controllers\base\SettingsController;
use crudle\app\printing\forms\PrinterSettingsForm;

class PrinterSettingsController extends SettingsController
{
    public function modelClass(): string
    {
        return PrinterSettingsForm::class;
    }
}
