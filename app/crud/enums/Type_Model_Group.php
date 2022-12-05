<?php

namespace crudle\app\main\enums;


class Type_Model_Group
{
    const Entity    = 'Entity'; // Master
    const Event     = 'Event'; // Transaction
    const Params    = 'Params'; // Settings
    const Form      = 'Form';
    const Page      = 'Page';

    public static function enums()
    {
        return [
            self::Entity,
            self::Event,
            self::Params,
            self::Form,
            self::Page,
        ];
    }
}
