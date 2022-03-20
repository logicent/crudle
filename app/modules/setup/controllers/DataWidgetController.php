<?php

namespace app\modules\setup\controllers;

use app\controllers\base\BaseCrudController;
use app\modules\setup\models\DataWidget;
use app\modules\setup\models\DataWidgetSearch;

class DataWidgetController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = DataWidget::class;
        $this->modelSearchClass = DataWidgetSearch::class;

        return parent::init();
    }
}
