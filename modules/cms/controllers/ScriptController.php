<?php

namespace logicent\cms\controllers;

use logicent\cms\controllers\base\BaseWebSettingsController;
use logicent\cms\models\WebsiteScriptForm;

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
