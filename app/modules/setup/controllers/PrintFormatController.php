<?php

namespace app\modules\setup\controllers;

use app\modules\setup\controllers\base\BaseSetupCrudController;
use app\modules\setup\models\PrintFormat;

class PrintFormatController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = PrintFormat::class;

        return parent::init();
    }
}
