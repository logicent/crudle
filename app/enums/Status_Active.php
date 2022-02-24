<?php

namespace app\enums;

class Status_Active
{
    const Yes   = 0;
    const No    = 1;

    const YesLabel   = 'Active';
    const NoLabel    = 'Inactive';

    const YesColor   = 'green';
    const NoColor = 'red';

    public static function enums()
    {
        return [
            0   => self::YesLabel,
            1   => self::NoLabel,
        ];
    }

    public static function enumsColor()
    {
        return [
            0   => self::YesColor,
            1   => self::NoColor,
        ];
    }    
}