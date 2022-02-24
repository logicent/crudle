<?php

namespace app\enums;

class Type_Module
{
    const System            = 'System';

    public static function enums()
    {
        return [
            self::System    => self::System,
        ];
    }
}