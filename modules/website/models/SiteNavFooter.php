<?php

namespace website\models;

use website\enums\Type_Menu;
use website\models\base\BaseWebMenu;

class SiteNavFooter extends BaseWebMenu
{
    public function init()
    {
        $this->type = Type_Menu::FooterNav;
    }
}
