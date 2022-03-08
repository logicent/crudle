<?php

use yii\helpers\Html;
use yii\helpers\Url;
use Zelenin\yii\SemanticUI\Elements;


$attributes = [];
if ($itemModelClass) :
    $fieldModel = new $itemModelClass();
    foreach ($fieldModel::attributes() as $attribute) :
        $attributes[$attribute] = $fieldModel->getAttributeLabel($attribute);
    endforeach;
    array_multisort($attributes);
endif;

$isReadonly = 
    $this->context->action->id == 'create' || 
    $this->context->action->id == 'update' ||
    $this->context->action->id == 'add-item';
?>
<tr id="<?= $model->formName() ?>_<?= $rowId ?>">
    <td class="center aligned select-row">
        <?= Html::activeHiddenInput($model, "[{$rowId}]id") ?>
        <?= Html::activeHiddenInput($model, "[{$rowId}]report_builder_id") ?>
        <?= Html::checkbox("[{$rowId}]id", false, ['label' => false]) ?>
    </td>
    <td>
        <?= Html::activeDropDownList($model, "[{$rowId}]attribute_name", 
                $attributes,
                ['class' => 'list-option']
            ) ?>
    </td>
    <td class="center aligned sort-by">
        <?= Html::activeCheckbox($model, "[{$rowId}]sort_by", ['label' => false]) ?>
    </td>
    <td class="sort-order">
        <?= Html::activeDropDownList($model, "[{$rowId}]sort_order", [
                null => '',
                SORT_ASC => Yii::t('app', 'ASC'),
                SORT_DESC => Yii::t('app', 'DESC'),
        ]) ?>
    </td>
    <td class="center aligned filter-by">
        <?= Html::activeCheckbox($model, "[{$rowId}]filter_by", ['label' => false]) ?>
    </td>
    <td class="center aligned">
        <?= Elements::button(Elements::icon('horizontal ellipsis'),
                    [
                        'class' => 'compact ui basic icon button edit-column--btn',
                        'data' => [
                            'url' => Url::to(['setup/report-builder/edit-item', 'id' => $model->id]),
                            'model-class' => get_class($model),
                            'model-id' => $model->id,
                            'form-view' => 'column/edit',
                        ]
                    ]
                ) ?>
    </td>
</tr>