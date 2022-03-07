<?php

namespace app\modules\customize\controllers;

use app\controllers\base\BaseCrudController;
use app\modules\customize\models\ReportBuilder;
use app\modules\customize\models\ReportBuilderItem;
use app\modules\customize\models\ReportBuilderSearch;

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
