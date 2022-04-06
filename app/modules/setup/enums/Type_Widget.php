<?php

namespace app\modules\main\enums;

use app\modules\setup\widgets\LineChart;
use app\modules\setup\widgets\BarChart;
use app\modules\setup\widgets\PieChart;
use app\modules\setup\widgets\NumberBlock;
use app\modules\setup\widgets\LatestEntries;

class Type_Widget
{
    const LineChart     = 'Line Chart';
    const BarChart      = 'Bar Chart';
    const PieChart      = 'Pie Chart';
    const NumberBlock   = 'Number Block';
    const LatestEntries = 'Latest Entries';

    public static function enums()
    {
        return [
            self::LineChart     => self::LineChart,
            self::BarChart      => self::BarChart,
            self::PieChart      => self::PieChart,
            self::NumberBlock   => self::NumberBlock,
            self::LatestEntries => self::LatestEntries,
        ];
    }

    public static function modelClasses()
    {
        return [
            self::LineChart     => LineChart::class,
            self::BarChart      => BarChart::class,
            self::NumberBlock   => NumberBlock::class,
            self::PieChart      => PieChartForm::class,
            self::LatestEntries => LatestEntries::class,
        ];
    }
}
