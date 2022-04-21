<?php

namespace crudle\setup\controllers;

use crudle\main\controllers\base\BaseCrudController;
use crudle\setup\models\ReportBuilder;
use crudle\setup\models\ReportBuilderItem;
use crudle\setup\models\ReportBuilderSearch;

class ReportBuilderController extends BaseCrudController
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
