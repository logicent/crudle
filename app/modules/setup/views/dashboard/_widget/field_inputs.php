<?php

use crudle\app\helpers\SelectableItems;
use crudle\app\main\enums\Column_Width;
use crudle\app\setup\enums\Data_Aggregate_Function;
use crudle\app\setup\enums\Type_Model;
use crudle\app\setup\enums\Type_Widget;
use crudle\app\setup\models\DataWidget;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\modules\Checkbox;
use Zelenin\yii\SemanticUI\modules\Radio;

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
        <?= Html::activeDropDownList($model, "[$rowId]id", 
                SelectableItems::get( DataWidget::class, $model, [
                    'valueAttribute' => 'id',
                    // 'addEmptyFirstItem' => false,
                    'filters' => [
                        'status' => false,
                    ]
                ])) ?>
    </td>
    <td>
        <?= Html::activeTextInput($model, "[$rowId]type") ?>
    </td>
    <td class="center aligned">
        <?= Checkbox::widget([
                'model' => $model,
                'attribute' => "[$rowId]status",
                'labelOptions' => ['label' => false],
                'options' => [
                    'data' => ['name' => 'status'],
                    'style' => 'vertical-align: text-top'
                ]
            ]) ?>
    </td>
</tr>