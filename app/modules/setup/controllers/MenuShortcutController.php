<?php

namespace app\modules\setup\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;
use app\modules\setup\models\MenuShortcutForm;

class MenuShortcutController extends BaseSettingsController
{
    public function init()
    {
        $this->modelClass = MenuShortcutForm::class;
        
        return parent::init();
    }
}
