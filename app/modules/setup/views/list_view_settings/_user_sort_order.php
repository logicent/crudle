<?php
// userSortOrder

use yii\helpers\Html;

$columns = $model::listViewColumns();

foreach ($columns as $column) :
    $filter = $model->userSortOrder[$column];
?>
    <!-- column (attribute), direction (ASC/DESC) -->
    <tr>
        <td><?= Html::activeTextInput($model, "[$column]userSortOrder", ['value' => $filter['field']]) ?></td>
        <td><?= Html::activeDropDownList($model, "[$column]userSortOrder", [
                        SORT_ASC => SORT_ASC,
                        SORT_DESC => SORT_DESC
                    ],
                    ['value' => $filter['order']]) ?>
        </td>
    </tr>
<?php
endforeach;