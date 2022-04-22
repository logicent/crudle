<?php

namespace _sample\enums;

use _sample\models\_Sample;

class Type_Model
{
    const _Sample = '_Sample';

    public static function enums()
    {
        return [
            self::_Sample =>  self::_Sample,
        ];
    }

    public static function modelClasses()
    {
        return [
            self::_Sample => _Sample::class,
        ];
    }
}
