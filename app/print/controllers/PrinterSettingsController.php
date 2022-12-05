<?php

namespace crudle\app\setup\controllers;

use crudle\app\setup\controllers\base\BaseSettingsController;
use crudle\app\setup\models\PrinterSettingsForm;

class PrinterSettingsController extends BaseSettingsController
{
    public function modelClass(): string
    {
        return PrinterSettingsForm::class;
    }
}
