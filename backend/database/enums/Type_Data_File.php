<?php

namespace crudle\app\database\enums;

use Yii;

class Type_Data_File
{
    const CSV  = 'csv';
    const Excel = 'excel';

    public static function enums()
    {
        return [
            self::CSV  => Yii::t('app', 'CSV'),
            self::Excel => Yii::t('app', 'Excel'),
        ];
    }
}