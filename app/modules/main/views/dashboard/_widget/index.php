<?php

use crudle\app\setup\enums\Type_Widget;
use crudle\app\widgets\BarChart;
use crudle\app\widgets\LatestEntries;
use crudle\app\widgets\LineChart;
use crudle\app\widgets\NumberBlock;
use crudle\app\widgets\PieChart;

foreach ($models as $model) :
    switch ($model->type) :
        case Type_Widget::LineChart:
            echo LineChart::widget([]);
            break;
        case Type_Widget::BarChart:
            echo BarChart::widget([]);
            break;
        case Type_Widget::PieChart:
            echo PieChart::widget([]);
            break;
        case Type_Widget::NumberBlock:
            echo NumberBlock::widget([]);
            break;
        case Type_Widget::LatestEntries:
            echo LatestEntries::widget([]);
            break;
        default:
    endswitch;
endforeach;
?>
<!-- <div class="ui stackable three column grid">
    <div class="five wide column">
        <h3 class="ui center aligned secondary top attached header segment">
            <span class="text-muted"></span>
        </h3>
        <div class="ui center aligned bottom attached padded segment">
            <div class="ui small statistic">
                <div class="value"></div>
                <div class="ui hidden divider"></div>
                <div class="text-muted"></div>
            </div>
        </div>
    </div>
</div> -->