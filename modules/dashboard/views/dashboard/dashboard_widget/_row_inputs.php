<?php

use crudle\app\main\helpers\App;
use crudle\app\crud\helpers\SelectableItems;
use crudle\app\main\enums\Column_Width;
use crudle\ext\dashboard\enums\Type_Widget;
use crudle\ext\dashboard\models\DashboardWidget;
use crudle\ext\dashboard\models\DataWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use icms\FomanticUI\Elements;
use icms\FomanticUI\modules\Checkbox;

?>
<tr>
    <td class="select-row center aligned">
        <?= Html::activeHiddenInput($model, "[{$rowId}]dashboard_id") ?>
        <?= Checkbox::widget([
                'name' => "[$rowId]id",
                'options' => ['style' => 'vertical-align: text-top']
            ]) ?>
    </td>
    <td>
        <?= Html::activeDropDownList($model, "[$rowId]type",
                SelectableItems::get( DataWidget::class, $model, [
                    'valueAttribute' => "CONCAT(`id`,' -', `title`)",
                    'filters' => [
                        'status' => false,
                    ]
                ]),
                ['data' => ['name' => 'type']]) ?>
    </td>
    <td>
        <?= Html::activeDropDownList($model, "[$rowId]column_width",
                Column_Width::enums(),
                ['data' => ['name' => 'column_width']]
            ) ?>
    </td>
    <td class="one wide center aligned">
        <?= Html::a(Elements::icon('grey pencil'), null, [
                    'class' => 'edit-row compact ui small basic icon button',
                    'style' => 'margin: 0em;',
                    'data' => [
                        'model-class' => DashboardWidget::class,
                        'form-view' => '@appMain/views/dashboard/dashboard_widget/field_inputs',
                    ]
                ]) ?>
        <?= Html::activeHiddenInput($model, "[$rowId]status", ['data' => ['name' => 'status']]) ?>
        <?= Html::activeHiddenInput($model, "[$rowId]data_aggregate_function", ['data' => ['name' => 'data_aggregate_function']]) ?>
        <?= Html::activeHiddenInput($model, "[$rowId]group_by_column", ['data' => ['name' => 'group_by_column']]) ?>
        <?= Html::activeHiddenInput($model, "[$rowId]show_filtered_data", ['data' => ['name' => 'show_filtered_data']]) ?>
        <?= Html::activeHiddenInput($model, "[$rowId]data_model", ['data' => ['name' => 'data_model']]) ?>
        <?= Html::activeHiddenInput($model, "[$rowId]id", ['data' => ['name' => 'id']]) ?>
    </td>
</tr>