<?php

namespace crudle\app\main\enums;

class Type_Module
{
    const App   = 'app';
    const Ext   = 'ext';
    const Kit   = 'kit';

    public static function enums()
    {
        return [
            self::App   => self::App,
            self::Ext   => self::Ext,
            self::Kit   => self::Kit,
        ];
    }
}
