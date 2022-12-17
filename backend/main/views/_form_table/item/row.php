<?php

use icms\FomanticUI\Elements;
use icms\FomanticUI\modules\Checkbox;
use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\helpers\Url;

$modelName = StringHelper::basename($modelClass);
$listId = Inflector::underscore($modelName);
?>
<tr data-row-id="<?= $rowId ?>">
    <td class="center aligned select-row">
        <?= Html::activeHiddenInput($model, "[$rowId]id") ?>
        <?= Html::activeHiddenInput($model, "[$rowId]$parentAttribute") ?>
        <?= Checkbox::widget([
                'name' => "[$rowId]id",
                'options' => ['style' => 'width: 17px; vertical-align: text-top']
            ]) ?>&ensp;
        <?= $rowId ?>
    </td>
    <?= $columns ?>
    <td class="center aligned">
        <?= Elements::button(Elements::icon('pencil alternate'), [
                    'class' => 'compact basic icon edit-row',
                    'data' => [
                        // 'hx-post' => Url::to(['edit-row', 'id' => $model->id]),
                        // 'hx-include' => '.-htmx-value',
                        // 'hx-target' => "body > div.ui.modals > #{$listId}__modal > .content",
                    ],
                ]
            ) ?>
    </td>
</tr>