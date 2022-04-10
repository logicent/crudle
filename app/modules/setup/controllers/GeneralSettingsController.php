<?php

namespace app\modules\setup\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;
use app\modules\setup\models\GeneralSettingsForm;

class GeneralSettingsController extends BaseSettingsController
{
    public function modelClass(): string
    {
        return GeneralSettingsForm::class;
    }
}
