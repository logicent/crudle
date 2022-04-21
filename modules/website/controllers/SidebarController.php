<?php

namespace website\controllers;

use crudle\main\controllers\base\BaseCrudController;

/**
 * SidebarController for the `Sidebar` model
 */
class SidebarController extends BaseCrudController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
