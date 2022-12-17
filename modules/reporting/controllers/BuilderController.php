<?php

namespace crudle\ext\reporting\controllers;

use crudle\app\crud\controllers\CrudController;
use crudle\ext\reporting\models\ReportBuilder;
use crudle\ext\reporting\models\ReportBuilderItem;
use crudle\ext\reporting\models\search\ReportBuilderSearch;

class BuilderController extends CrudController
{
    public $columnModelClass;

    public function init()
    {
        $this->columnModelClass = ReportBuilderItem::class;

        return parent::init();
    }

    public function modelClass(): string
    {
        return ReportBuilder::class;
    }

    public function searchModelClass(): string
    {
        return ReportBuilderSearch::class;
    }
}
