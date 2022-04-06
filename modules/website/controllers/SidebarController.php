<?php

namespace website\controllers;

use app\modules\main\controllers\base\BaseCrudController;

/**
 * SidebarController for the `Sidebar` model
 */
class SidebarController extends BaseCrudController
{
    public function actionIndex()
    {
        $this->sidebar = false;

        return $this->render('index');
    }
}