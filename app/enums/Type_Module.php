<?php

namespace app\enums;

class Type_Module
{
    const System            = 'System';
    const Customize         = 'Customize';
    const Website           = 'Website';

    public static function enums()
    {
        return [
            self::System           => self::System,
            self::Customize        => self::Customize,
            self::Website          => self::Website,
        ];
    }
}
