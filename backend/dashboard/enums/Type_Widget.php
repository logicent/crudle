<?php

namespace crudle\app\dashboard\enums;

use crudle\app\setting\widgets\LineChart;
use crudle\app\setting\widgets\BarChart;
use crudle\app\setting\widgets\PieChart;
use crudle\app\setting\widgets\NumberBlock;
use crudle\app\setting\widgets\LatestEntries;

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

    public static function enumIcons()
    {
        return [
            self::LineChart     => 'line chart',
            self::BarChart      => 'bar chart',
            self::PieChart      => 'pie chart',
            self::NumberBlock   => 'calculator',
            self::LatestEntries => 'list',
        ];
    }

    public static function modelClasses()
    {
        return [
            self::LineChart     => LineChart::class,
            self::BarChart      => BarChart::class,
            self::PieChart      => PieChart::class,
            self::NumberBlock   => NumberBlock::class,
            self::LatestEntries => LatestEntries::class,
        ];
    }
}
