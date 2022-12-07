<?php

namespace crudle\app\crud\enums;


class Type_Model_Id
{
    const AutoIncrementedInteger    = 1;
    const GeneratedUuid             = 2;
    const ManuallyEnteredText       = 3;
    const CompositeUniqueText       = 4;
    const UniqueIncrementedValue    = 5;
    const UniqueIncrementedCount    = 6;

    public static function enums()
    {
        return [
            self::AutoIncrementedInteger,
            self::GeneratedUuid,
            self::ManuallyEnteredText,
            self::CompositeUniqueText,
            self::UniqueIncrementedCount,
            self::UniqueIncrementedValue,
        ];
    }
}