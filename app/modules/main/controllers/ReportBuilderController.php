<?php

namespace crudle\app\main\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\app\main\models\ReportBuilder;
use crudle\app\main\models\ReportBuilderItem;
use crudle\app\main\models\search\ReportBuilderSearch;


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
