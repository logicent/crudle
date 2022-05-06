<?php

namespace crudle\ext\cms\controllers;

use crudle\ext\cms\controllers\base\BaseWebSettingsController;
use crudle\ext\cms\models\WebsiteScriptForm;

/**
 * ScriptController for the `WebsiteScriptForm` model
 */
class ScriptController extends BaseWebSettingsController
{
    public function modelClass(): string
    {
        return WebsiteScriptForm::class;
    }
}
