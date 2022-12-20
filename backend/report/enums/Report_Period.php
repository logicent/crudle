<?php

namespace crudle\app\report\enums;

use Yii;

class Report_Period
{
    // const Daily     = 365;
    const Weekly    = 52;
    // const BiWeekly  = 25;
    const Monthly   = 12;
    // const BiMonthly = 6;
    const Quarterly = 4;
    const HalfYearly = 2;
    const Yearly    = 1;
    const NotSet    = 0; // On-demand or On done

    public static function enums()
    {
        return [
            self::NotSet    => Yii::t('app', 'Not set'),
            self::Weekly    => Yii::t('app', 'Weekly'),
            self::Monthly   => Yii::t('app', 'Monthly'),
            self::Quarterly => Yii::t('app', 'Quarterly'),
            self::HalfYearly   => Yii::t('app', 'Half-yearly'),
            self::Yearly    => Yii::t('app', 'Yearly'),
        ];
    }
}