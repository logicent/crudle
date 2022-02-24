<?php

namespace app\modules\setup\controllers;

use app\modules\setup\controllers\base\BaseSetupCrudController;
use app\modules\setup\models\PrintStyle;

class PrintStyleController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = PrintStyle::class;

        return parent::init();
    }
}
