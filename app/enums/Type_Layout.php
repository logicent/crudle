<?php

namespace app\enums;

use Yii;

class Type_Layout
{
    const Main_Fw   = 'main_fw'; // fullwidth
    const Main      = 'main';
    const Print     = 'print';
    const Report    = 'report';
    const Site      = 'site';

    public static function enums()
    {
        return [
            self::Main_Fw,
            self::Main,
            self::Print,
            self::Report,
            self::Site,
        ];
    }
}
