<?php

namespace crudle\ext\cms\controllers;

use crudle\app\main\controllers\base\BaseCrudController;

/**
 * SidebarController for the `Sidebar` model
 */
class SidebarController extends BaseCrudController
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
}
