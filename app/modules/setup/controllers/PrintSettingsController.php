<?php

namespace crudle\app\setup\controllers;

use crudle\app\setup\controllers\base\BaseSettingsController;
use crudle\app\setup\models\PrintSettingsForm;

class PrintSettingsController extends BaseSettingsController
{
    public function modelClass(): string
    {
        return PrintSettingsForm::class;
    }
}
