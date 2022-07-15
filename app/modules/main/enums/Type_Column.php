<?php

namespace crudle\app\main\enums;

// use Yii;

class Type_Column
{
    const Left = 'lft';
    const Right = 'rgt';

    public static function enums()
    {
        return [
            self::Left,
            self::Right,
        ];
    }
}