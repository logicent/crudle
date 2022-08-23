<?php

use yii\helpers\Html;
use yii\helpers\Url;
use icms\FomanticUI\Elements;
use icms\FomanticUI\modules\Checkbox;

$attributes = [];
// if ($itemModelClass) :
//     $fieldModel = new $itemModelClass();
//     foreach ($fieldModel::attributes() as $attribute) :
//         $attributes[$attribute] = $fieldModel->getAttributeLabel($attribute);
//     endforeach;
//     array_multisort($attributes);
// endif;

$isReadonly = 
    $this->context->action->id == 'create' || 
    $this->context->action->id == 'update' ||
    $this->context->action->id == 'add-row';
?>
<tr id="<?= $model->formName() ?>_<?= $rowId ?>">
    <td class="center aligned select-row">
        <?= Html::activeHiddenInput($model, "[{$rowId}]id") ?>
        <?= Html::activeHiddenInput($model, "[{$rowId}]report_builder_id") ?>
        <?= Checkbox::widget([
                'name' => "[$rowId]id",
                'options' => ['style' => 'vertical-align: text-top']
            ]) ?>
    </td>
    <td>
        <?= Html::activeDropDownList($model, "[{$rowId}]attribute_name", 
                $attributes,
                ['class' => 'rb--attribute-name']
            ) ?>
    </td>
    <td class="center aligned sort-by">
        <?= Checkbox::widget([
                'model' => $model,
                'attribute' => "[$rowId]sort_by",
                'labelOptions' => ['label' => false],
                'options' => [
                    'data' => ['name' => 'sort_by'],
                    'style' => 'vertical-align: text-top'
                ]
            ]) ?>
    </td>
    <td class="sort-order">
        <?= Html::activeDropDownList($model, "[{$rowId}]sort_order", [
                null => '',
                SORT_ASC => Yii::t('app', 'ASC'),
                SORT_DESC => Yii::t('app', 'DESC'),
        ]) ?>
    </td>
    <td class="center aligned filter-by">
        <?= Checkbox::widget([
                'model' => $model,
                'attribute' => "[$rowId]filter_by",
                'labelOptions' => ['label' => false],
                'options' => [
                    'data' => ['name' => 'filter_by'],
                    'style' => 'vertical-align: text-top'
                ]
            ]) ?>
    </td>
    <td class="center aligned">
        <?= Elements::button(Elements::icon('horizontal ellipsis'),
                    [
                        'class' => 'compact ui basic icon button edit-column--btn',
                        'data' => [
                            'url' => Url::to(['setup/report-builder/edit-row', 'id' => $model->id]),
                            'model-class' => get_class($model),
                            'model-id' => $model->id,
                            'form-view' => 'column/edit',
                        ]
                    ]
                ) ?>
    </td>
</tr>