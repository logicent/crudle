<?php

namespace crudle\ext\web_cms\controllers;

use crudle\app\crud\controllers\CrudController;
use crudle\ext\web_cms\models\search\SidebarMenuSearch;
use crudle\ext\web_cms\models\SidebarMenu;

/**
 * SidebarMenuController for the `SidebarMenu` model
 */
class SidebarMenuController extends CrudController
{
    public function modelClass(): string
    {
        return SidebarMenu::class;
    }

    public function searchModelClass(): string
    {
        return SidebarMenuSearch::class;
    }
}
