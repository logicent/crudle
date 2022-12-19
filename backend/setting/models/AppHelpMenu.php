<?php

namespace crudle\app\setting\models;

use crudle\app\setting\enums\Type_Menu;
use crudle\app\setting\models\base\BaseAppMenu;

class AppHelpMenu extends BaseAppMenu
{
    public function init()
    {
        $this->type = Type_Menu::Help;
    }
}