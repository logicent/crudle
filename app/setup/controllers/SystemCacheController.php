<?php

namespace crudle\app\setup\controllers;

use crudle\app\main\controllers\base\ViewController;
use crudle\app\main\enums\Type_Form_View;
use crudle\app\main\enums\Type_View;

class SystemCacheController extends ViewController
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
    public function defaultActionViewType()
    {
        return Type_View::List;
    }
}
