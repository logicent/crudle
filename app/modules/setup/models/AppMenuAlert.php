<?php

namespace app\modules\setup\models;

use app\modules\setup\enums\Type_Menu;
use app\modules\setup\models\base\BaseAppMenu;

class AppMenuAlert extends BaseAppMenu
{
    public function init()
    {
        $this->type = Type_Menu::Alert;
    }
}