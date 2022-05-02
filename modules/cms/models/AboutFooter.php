<?php

namespace logicent\cms\models;

use logicent\cms\enums\Type_Menu;
use logicent\cms\models\base\BaseWebMenu;

class AboutFooter extends BaseWebMenu
{
    public function init()
    {
        $this->type = Type_Menu::FooterNav;
    }
}
