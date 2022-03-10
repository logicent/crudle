<?php

namespace app\modules\website\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;

/**
 * ScriptController for the `WebsiteScriptForm` model
 */
class ScriptController extends BaseSettingsController
{
    /**
     * Renders the index view for the model
     * @return string
     */
    public function actionIndex()
    {
        $this->sidebar = false;

        return $this->render('index');
    }
}
