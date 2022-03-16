<?php

namespace app\modules\setup\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;
use app\modules\setup\models\CreateMenuForm;

class CreateMenuController extends BaseSettingsController
{
    public function init()
    {
        $this->modelClass = CreateMenuForm::class;
        
        return parent::init();
    }
}
