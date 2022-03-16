<?php

namespace app\modules\setup\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;
use app\modules\setup\models\HelpMenuForm;

class HelpMenuController extends BaseSettingsController
{
    public function init()
    {
        $this->modelClass = HelpMenuForm::class;
        
        return parent::init();
    }
}
