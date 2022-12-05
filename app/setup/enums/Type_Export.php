<?php

namespace crudle\app\setup\enums;

use Yii;

class Type_Export
{
    const AllRecords  = 'all_records'; // All records will be exported
    const FilteredRecords = 'filtered_records'; // Some records will be exported
    const FiveRecords = 'five_records'; // 5 records will be exported
    const BlankTemplate = 'blank_template'; // No records will be exported

    public static function enums()
    {
        return [
            self::AllRecords  => Yii::t('app', 'All records'),
            self::FilteredRecords => Yii::t('app', 'Filtered records'),
            self::FiveRecords => Yii::t('app', '5 records'),
            self::BlankTemplate => Yii::t('app', 'Blank template'),
        ];
    }
}