<?php

namespace crudle\setup\models;

use crudle\setup\enums\Type_Menu;
use crudle\setup\models\base\BaseAppMenu;

class AppMenuUser extends BaseAppMenu
{
    public function init()
    {
        $this->type = Type_Menu::User;
    }
}