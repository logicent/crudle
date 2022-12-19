<?php

namespace crudle\app\reporting\controllers;

use crudle\app\crud\controllers\CrudController;
use crudle\app\reporting\models\ReportBuilder;
use crudle\app\reporting\models\ReportBuilderItem;
use crudle\app\reporting\models\search\ReportBuilderSearch;

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
