<?php

namespace crudle\app\crud\enums;

// use Yii;

class Type_Link
{
    const Query = 'Query';
    const Model = 'Model';

    public static function enums()
    {
        return [
            self::Query,
            self::Model,
        ];
    }
}