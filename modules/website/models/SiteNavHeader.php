<?php

namespace website\models;

use website\enums\Type_Menu;
use website\models\base\BaseWebMenu;

class SiteNavHeader extends BaseWebMenu
{
    public function init()
    {
        $this->type = Type_Menu::HeaderNav;
    }
}
