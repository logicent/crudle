<?php

namespace crudle\app\report\controllers;

use crudle\app\crud\controllers\CrudController;
use crudle\app\report\models\ReportQuery;
use crudle\app\report\models\ReportQueryItem;
use crudle\app\report\models\search\ReportQuerySearch;

class BuilderController extends CrudController
{
    public $columnModelClass;

    public function init()
    {
        $this->columnModelClass = ReportQueryItem::class;

        return parent::init();
    }

    public function modelClass(): string
    {
        return ReportQuery::class;
    }

    public function searchModelClass(): string
    {
        return ReportQuerySearch::class;
    }
}
