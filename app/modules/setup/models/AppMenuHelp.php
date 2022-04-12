<?php

namespace app\modules\setup\models;

use app\modules\setup\enums\Type_Menu;
use app\modules\setup\models\base\BaseAppMenu;

class AppMenuHelp extends BaseAppMenu
{
    public function init()
    {
        $this->type = Type_Menu::Help;
    }
}