<?php

namespace crudle\app\web_cms\models;

use crudle\app\web_cms\enums\Type_Menu;
use crudle\app\web_cms\models\base\BaseWebMenu;

class SiteNavFooter extends BaseWebMenu
{
    public function init()
    {
        $this->type = Type_Menu::FooterNav;
    }
}
