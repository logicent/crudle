<?php

namespace crudle\ext\dashboard\enums;

class Type_Aggregate
{
    const Count = 'COUNT';
    const Sum = 'SUM';
    const Average = 'AVERAGE';
    const Min = 'MIN';
    const Max = 'MAX';

    public static function enums()
    {
        return [
            self::Count => self::Count,
            self::Sum => self::Sum,
            self::Average => self::Average,
            self::Min => self::Min,
            self::Max => self::Max,
        ];
    }
}