<?php

namespace crudle\app\web_cms\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\app\main\enums\Type_Form_View;

class RouteMetaController extends BaseCrudController
{
    public function actions()
    {
        return [
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    // ViewInterface
    public function formViewType()
    {
        return Type_Form_View::Single;
    }
}
