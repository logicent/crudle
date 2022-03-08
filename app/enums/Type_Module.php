<?php

namespace app\enums;

// Core Modules
class Type_Module
{
    const Main          = 'Main';
    const Customize     = 'Customize';
    const Integration   = 'Integration';
    const Setup         = 'Setup';
    const Tool          = 'Tool';
    const Website       = 'Website';

    public static function enums()
    {
        return [
            self::Main          => self::Main,
            self::Customize     => self::Customize,
            self::Integration   => self::Integration,
            self::Setup         => self::Setup,
            self::Tool          => self::Tool,
            self::Website       => self::Website,
        ];
    }
}
