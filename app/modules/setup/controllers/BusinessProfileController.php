<?php

namespace app\modules\setup\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;
use app\modules\setup\models\BusinessProfileForm;

class BusinessProfileController extends BaseSettingsController
{
    public function init()
    {
        $this->modelClass = BusinessProfileForm::class;

        return parent::init();
    }
}
