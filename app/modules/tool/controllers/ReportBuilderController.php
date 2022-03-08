<?php

namespace app\modules\tool\controllers;

use app\controllers\base\BaseCrudController;
use app\modules\tool\models\ReportBuilder;
use app\modules\tool\models\ReportBuilderItem;
use app\modules\tool\models\ReportBuilderSearch;

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
