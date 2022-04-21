<?php

namespace crudle\setup\controllers;

use crudle\setup\controllers\base\BaseSettingsController;
use crudle\setup\models\PrinterSettingsForm;

class PrinterSettingsController extends BaseSettingsController
{
    public function modelClass(): string
    {
        return PrinterSettingsForm::class;
    }
}
