<?php

namespace app\modules\setup\controllers;

use app\modules\setup\controllers\base\BaseSetupCrudController;
use app\modules\setup\models\ReportBuilder;
use app\modules\setup\models\ReportBuilderItem;

class ReportBuilderController extends BaseSetupCrudController
{
    public $columnModelClass;

    public function init()
    {
        $this->modelClass = ReportBuilder::class;
        $this->columnModelClass = ReportBuilderItem::class;

        return parent::init();
    }
}
