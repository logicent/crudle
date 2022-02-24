<?php

namespace app\modules\setup\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;
use app\modules\setup\models\PrinterSettingsForm;

class PrinterSettingsController extends BaseSettingsController
{
    public function init()
    {
        $this->modelClass = PrinterSettingsForm::class;

        return parent::init();
    }
}
