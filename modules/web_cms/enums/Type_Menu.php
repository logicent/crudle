<?php

namespace crudle\ext\web_cms\enums;

use Yii;

class Type_Menu
{
    const HeaderNav = 'Header Nav';
    const FooterNav = 'Footer Nav';

    public static function enums()
    {
        return [
            self::HeaderNav => Yii::t('app', 'Header nav'),
            self::FooterNav => Yii::t('app', 'Footer nav'),
        ];
    }

    public static function enumIcons()
    {
        return [
            self::HeaderNav => '',
            self::FooterNav => '',
        ];
    }
}