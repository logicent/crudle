<?php

namespace crudle\app\printing\controllers;

use crudle\app\setup\controllers\base\BaseSettingsController;
use crudle\app\printing\forms\PrinterSettingsForm;

class PrinterSettingsController extends BaseSettingsController
{
    public function modelClass(): string
    {
        return PrinterSettingsForm::class;
    }
}
