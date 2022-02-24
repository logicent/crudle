<?php
// userFilters

use yii\helpers\Html;

$columns = $model::filterColumns();

foreach ($columns as $column) :
    $filter = $model->userFilters[$column];
?>
    <!-- column (attribute), operator, value -->
    <tr>
        <td><?= Html::activeTextInput($model, "[$column]userFilters", ['value' => $filter['field']]) ?></td>
        <td><?= Html::activeTextInput($model, "[$column]userFilters", ['value' => $filter['operator']]) ?></td>
        <td><?= Html::activeTextInput($model, "[$column]userFilters", ['value' => $filter['value']]) ?></td>
    </tr>
<?php
endforeach;