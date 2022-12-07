<?php

namespace crudle\app\printing\controllers;

use crudle\app\setup\controllers\base\BaseSettingsController;
use crudle\app\printing\forms\PrintSettingsForm;

class PrintSettingsController extends BaseSettingsController
{
    public function modelClass(): string
    {
        return PrintSettingsForm::class;
    }
}
