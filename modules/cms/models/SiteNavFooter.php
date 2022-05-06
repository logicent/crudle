<?php

namespace crudle\ext\cms\models;

use crudle\ext\cms\enums\Type_Menu;
use crudle\ext\cms\models\base\BaseWebMenu;

class SiteNavFooter extends BaseWebMenu
{
    public function init()
    {
        $this->type = Type_Menu::FooterNav;
    }
}
