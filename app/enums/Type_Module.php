<?php

namespace crudle\app\enums;

// Core Modules
class Type_Module
{
    const Main      = 'Main';
    const Setup     = 'Setup';
    const WebCMS    = 'WebCMS';

    public static function enums()
    {
        return [
            self::Main      => self::Main,
            self::Setup     => self::Setup,
            self::WebCMS    => self::WebCMS,
        ];
    }
}
