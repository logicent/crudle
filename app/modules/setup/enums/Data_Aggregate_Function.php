<?php

namespace crudle\app\setup\enums;


class Data_Aggregate_Function
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