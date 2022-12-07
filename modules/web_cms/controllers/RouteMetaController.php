<?php

namespace crudle\ext\web_cms\controllers;

use crudle\app\crud\controllers\CrudController;
use crudle\app\main\enums\Type_Form_View;

class RouteMetaController extends CrudController
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
