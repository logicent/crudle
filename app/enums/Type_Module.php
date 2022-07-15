<?php

namespace crudle\app\enums;

// Core Modules
class Type_Module
{
    const Main      = 'main';
    const Setup     = 'setup';
    const WebCMS    = 'web_cms';
    const Kit       = 'codegen';

    public static function enums()
    {
        return [
            self::Main      => self::Main,
            self::Setup     => self::Setup,
            self::WebCMS    => self::WebCMS,
            self::Kit       => self::Kit,
        ];
    }
}
