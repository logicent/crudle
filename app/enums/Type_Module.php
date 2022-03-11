<?php

namespace app\enums;

// Core Modules
class Type_Module
{
    const Main          = 'Main';
    const Setup         = 'Setup';
    const Website       = 'Website';

    public static function enums()
    {
        return [
            self::Main      => self::Main,
            self::Setup     => self::Setup,
            self::Website   => self::Website,
        ];
    }
}
