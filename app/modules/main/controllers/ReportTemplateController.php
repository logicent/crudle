<?php

namespace crudle\app\main\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\app\main\models\ReportTemplate;
use crudle\app\main\models\ReportTemplateItem;
use crudle\app\main\models\search\ReportTemplateSearch;

class ReportTemplateController extends BaseCrudController
{
    public $sectionModelClass;

    public function init()
    {
        $this->sectionModelClass = ReportTemplateItem::class;

        return parent::init();
    }

    public function modelClass(): string
    {
        return ReportTemplate::class;
    }

    public function searchModelClass(): string
    {
        return ReportTemplateSearch::class;
    }
}
