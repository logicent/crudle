<?php

namespace app\modules\website\controllers;

use app\controllers\base\BaseCrudController;

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
