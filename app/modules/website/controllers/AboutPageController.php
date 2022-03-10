<?php

namespace app\modules\website\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;

class AboutPageController extends BaseSettingsController
{
    public function actionIndex()
    {
        $this->sidebar = false;

        return $this->render('index');
    }
}
