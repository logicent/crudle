<?php

namespace app\modules\setup\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;
use app\modules\setup\models\GlobalSettingsForm;
use app\modules\setup\models\Setup;

class SetupController extends BaseSettingsController
{
    public function init()
    {
        $this->sidebar = true;
        $this->sidebarWidth = 'three';
        $this->mainWidth = 'thirteen';

        return parent::init();
    }

    public function actionIndex()
    {
        // load the default settings tab
        $model = Setup::getSettings( GlobalSettingsForm::class );

        return $this->render('index', [
            'model' => $model
        ]);
    }
}
