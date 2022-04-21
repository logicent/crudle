<?php

namespace crudle\setup\enums;

class Status_User
{
    const Active    = 1;
    const Deleted   = 0;

    public static function enums()
    {
        return [
            self::Active    => self::Active,
            self::Deleted   => self::Deleted,
        ];
    }
}