<?php

namespace crudle\app\report\controllers;

use crudle\app\crud\controllers\CrudController;
use crudle\app\report\models\ReportBuilder;
use crudle\app\report\models\ReportBuilderItem;
use crudle\app\report\models\search\ReportBuilderSearch;

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
