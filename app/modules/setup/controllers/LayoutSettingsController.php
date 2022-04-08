<?php

namespace app\modules\setup\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;
use app\modules\setup\models\LayoutSettingsForm;

class LayoutSettingsController extends BaseSettingsController
{
    public function modelClass()
    {
        return LayoutSettingsForm::class;
    }
}
