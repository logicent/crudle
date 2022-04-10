<?php

namespace app\modules\setup\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;
use app\modules\setup\models\PrintSettingsForm;

class PrintSettingsController extends BaseSettingsController
{
    public function modelClass(): string
    {
        return PrintSettingsForm::class;
    }
}
