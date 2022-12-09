<?php

namespace crudle\ext\report\controllers;

use crudle\app\crud\controllers\CrudController;
use crudle\ext\report\models\ReportTemplate;
use crudle\ext\report\models\ReportTemplateItem;
use crudle\ext\report\models\search\ReportTemplateSearch;

class TemplateController extends CrudController
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
