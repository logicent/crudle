<?php

namespace app\modules\setup\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;
use app\modules\setup\models\OrganizationProfileForm;

class OrganizationProfileController extends BaseSettingsController
{
    public function init()
    {
        $this->modelClass = OrganizationProfileForm::class;

        return parent::init();
    }
}
