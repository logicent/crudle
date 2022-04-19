<?php

namespace crudle\setup\controllers;

use crudle\setup\controllers\base\BaseSettingsController;
use crudle\setup\models\PrintSettingsForm;

class PrintSettingsController extends BaseSettingsController
{
    public function modelClass(): string
    {
        return PrintSettingsForm::class;
    }
}
