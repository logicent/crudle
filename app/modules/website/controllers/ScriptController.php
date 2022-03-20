<?php

namespace app\modules\website\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;
use app\modules\website\models\WebsiteScriptForm;

/**
 * ScriptController for the `WebsiteScriptForm` model
 */
class ScriptController extends BaseSettingsController
{
    public function init()
    {
        $this->modelClass = WebsiteScriptForm::class;

        return parent::init();
    }
}
