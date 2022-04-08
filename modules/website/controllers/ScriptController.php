<?php

namespace website\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;
use website\models\WebsiteScriptForm;

/**
 * ScriptController for the `WebsiteScriptForm` model
 */
class ScriptController extends BaseSettingsController
{
    public function modelClass()
    {
        return WebsiteScriptForm::class;
    }
}
