<?php

use crudle\app\dashboard\assets\ChartJsAsset;
use crudle\app\dashboard\enums\Type_Widget;
use crudle\app\dashboard\models\DataWidget;
use crudle\app\widgets\ChartJs;
use crudle\app\widgets\LatestEntries;

ChartJsAsset::register($this);

?>

<div class="ui stackable sixteen column grid">
    <?php foreach ($models as $model) : ?>
        <?php $widget = DataWidget::findOne($model->type);  ?>
        <div class="<?= $model->column_width ?> wide column">
            <h3 class="ui center aligned secondary top attached header segment">
                <span class="text-muted"><?= $widget->title ?></span>
            </h3>
            <div class="ui center aligned bottom attached padded segment">

                <?php switch ($widget->type):
                    case Type_Widget::NumberBlock:
                        echo $this->render('@appMain/views/dashboards/_widget/_card',[
                            'count' => $widget->data_model::find()
                            ->select($widget->group_by_column)
                            ->addSelect("{$widget->data_aggregate_function}(*) as data")
                            ->groupBy($widget->group_by_column)->createCommand(),
                            'column' => $widget->group_by_column
                        ]);
                        break;
                    case Type_Widget::LineChart:
                        echo ChartJs::widget([
                            'type' => ChartJs::TYPE_LINE,
                            'clientOptions' => [

                                'legend' => ['display' => false],
                            ],
                            'datasets' => [
                                [
                                    'query' => $widget->data_model::find()
                                        ->select($widget->group_by_column)
                                        ->addSelect("{$widget->data_aggregate_function}(*) as data")
                                        ->groupBy($widget->group_by_column)
                                        ->createCommand(),
                                    'labelAttribute' => $widget->group_by_column
                                ]
                            ]
                        ]);
                        break;
                    case Type_Widget::BarChart:
                        echo ChartJs::widget([
                            'type' => ChartJs::TYPE_BAR,
                            'clientOptions' => [

                                'legend' => ['display' => false],
                            ],
                            'datasets' => [
                                [
                                    'query' => $widget->data_model::find()
                                        ->select($widget->group_by_column)
                                        ->addSelect("{$widget->data_aggregate_function}(*) as data")
                                        ->groupBy($widget->group_by_column)
                                        ->createCommand(),
                                    'labelAttribute' => $widget->group_by_column
                                ]
                            ]
                        ]);
                        break;
                    case Type_Widget::PieChart:
                        echo ChartJs::widget([
                            'type' => ChartJs::TYPE_PIE,
                            'clientOptions' => [

                                'legend' => ['display' => false],
                            ],
                            'datasets' => [
                                [
                                    'query' => $widget->data_model::find()
                                        ->select($widget->group_by_column)
                                        ->addSelect("{$widget->data_aggregate_function}(*) as data")
                                        ->groupBy($widget->group_by_column)
                                        ->createCommand(),
                                    'labelAttribute' => $widget->group_by_column
                                ]
                            ]
                        ]);
                        break;
                    case Type_Widget::LatestEntries:
                        echo LatestEntries::widget([]);
                        break;
                    default:
                endswitch;
                ?>
            </div>
        </div>
    <?php endforeach ?>
</div>