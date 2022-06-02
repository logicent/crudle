<?php

namespace crudle\app\setup\controllers;

use app\models\DeveloperSettingsForm;
use crudle\app\setup\controllers\base\BaseSettingsController;

class DeveloperSettingsController extends BaseSettingsController
{
    public function modelClass(): string
    {
        return DeveloperSettingsForm::class;
    }
}
