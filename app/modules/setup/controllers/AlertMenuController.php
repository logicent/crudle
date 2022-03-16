<?php

namespace app\modules\setup\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;
use app\modules\setup\models\AlertMenuForm;

class AlertMenuController extends BaseSettingsController
{
    public function init()
    {
        $this->modelClass = AlertMenuForm::class;
        
        return parent::init();
    }
}
