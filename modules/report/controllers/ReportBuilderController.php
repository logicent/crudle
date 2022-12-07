<?php

namespace crudle\ext\report\controllers;

use crudle\app\crud\controllers\CrudController;
use crudle\ext\report\models\ReportBuilder;
use crudle\ext\report\models\ReportBuilderItem;
use crudle\ext\report\models\search\ReportBuilderSearch;


class ReportBuilderController extends CrudController
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
