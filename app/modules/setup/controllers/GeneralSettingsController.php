<?php

namespace crudle\setup\controllers;

use crudle\setup\controllers\base\BaseSettingsController;
use crudle\setup\models\GeneralSettingsForm;

class GeneralSettingsController extends BaseSettingsController
{
    public function modelClass(): string
    {
        return GeneralSettingsForm::class;
    }
}
