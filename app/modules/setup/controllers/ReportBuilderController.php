<?php

namespace app\modules\setup\controllers;

use app\controllers\base\BaseCrudController;
use app\modules\setup\models\ReportBuilder;
use app\modules\setup\models\ReportBuilderItem;
use app\modules\setup\models\ReportBuilderSearch;

class ReportBuilderController extends BaseCrudController
{
    public $columnModelClass;

    public function init()
    {
        $this->modelClass = ReportBuilder::class;
        $this->modelSearchClass = ReportBuilderSearch::class;
        $this->columnModelClass = ReportBuilderItem::class;

        return parent::init();
    }
}
