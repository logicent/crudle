<?php

namespace crudle\ext\web_cms\controllers\cms;

use crudle\ext\web_cms\controllers\base\BaseWebSettingsController;

/**
 * GoogleSettingsController for the `GoogleSettingsForm` model
 */
class GoogleSettingsController extends BaseWebSettingsController
{
    /**
     * Renders the index view for the form model
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
