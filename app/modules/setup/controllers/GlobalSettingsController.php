<?php

namespace app\modules\setup\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;
use app\modules\setup\models\GlobalSettingsForm;

class GlobalSettingsController extends BaseSettingsController
{
    public function init()
    {
        $this->modelClass = GlobalSettingsForm::class;
        
        return parent::init();
    }
}
