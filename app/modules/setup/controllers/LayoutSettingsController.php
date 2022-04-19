<?php

namespace crudle\setup\controllers;

use crudle\setup\controllers\base\BaseSettingsController;
use crudle\setup\models\LayoutSettingsForm;

class LayoutSettingsController extends BaseSettingsController
{
    public function modelClass(): string
    {
        return LayoutSettingsForm::class;
    }
}
