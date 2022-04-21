<?php

namespace website\controllers;

use website\controllers\base\BaseWebSettingsController;
use website\models\WebsiteScriptForm;

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
