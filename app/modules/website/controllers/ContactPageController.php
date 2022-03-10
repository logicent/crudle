<?php

namespace app\modules\website\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;

class ContactPageController extends BaseSettingsController
{
    public function actionIndex()
    {
        $this->sidebar = false;

        return $this->render('index');
    }
}
