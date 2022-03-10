<?php

namespace app\modules\setup\enums;

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