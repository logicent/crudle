<?php

namespace crudle\app\setup\controllers;

use crudle\app\helpers\App;
use crudle\app\main\controllers\base\BaseCrudController;
use crudle\app\setup\models\ReportBuilder;
use crudle\app\setup\models\ReportBuilderItem;
use crudle\app\setup\models\search\ReportBuilderSearch;
use Yii;
use yii\helpers\Html;
use yii\helpers\Inflector;

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
