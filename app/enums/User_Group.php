<?php

namespace app\enums;

class User_Group
{
    const Staff = 'Staff';

    public static function enums()
    {
        return [
            self::Staff => self::Staff,
        ];
    }
}