<?php

namespace crudle\app\main\helpers;

// use Aeon\Calendar\Gregorian\DateTime;
use Yii;

class DateTimeHelper
{
    public static function getShortRelativeTime( $long_time )
    {
        $rel_time = Yii::$app->formatter->asRelativeTime( $long_time );

        // remove ago in text
        $rel_time = substr_replace($rel_time, '', -3);

        // abbreviate text to short hand
        $rel_time = str_replace('seconds', 's', $rel_time);

        $rel_time = str_replace('a minute', '1 m', $rel_time);
        $rel_time = str_replace('minutes', 'm', $rel_time);

        $rel_time = str_replace('an hour', '1 h', $rel_time);
        $rel_time = str_replace('hours', 'h', $rel_time);

        $rel_time = str_replace('a day', '1 d', $rel_time);
        $rel_time = str_replace('days', 'd', $rel_time);

        $rel_time = str_replace('a month', '1 M', $rel_time);
        $rel_time = str_replace('months', 'M', $rel_time);

        $rel_time = str_replace('a year', '1 y', $rel_time);
        $rel_time = str_replace('years', 'y', $rel_time);

        return $rel_time;
    }
}
