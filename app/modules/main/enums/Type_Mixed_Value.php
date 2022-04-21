<?php

namespace crudle\main\enums;

class Type_Mixed_Value
{
    const CommaSeparated    = ','; // use explode & implode to convert
    const JsonFormatted     = 'json'; // use Json helper to convert values

    public static function enums()
    {
        return [
            self::CommaSeparated,
            self::JsonFormatted,
        ];
    }
}