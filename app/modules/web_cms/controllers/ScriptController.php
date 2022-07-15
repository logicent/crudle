<?php

namespace crudle\app\web_cms\controllers;

use crudle\app\web_cms\controllers\base\BaseWebSettingsController;
use crudle\app\web_cms\models\WebsiteScriptForm;

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
