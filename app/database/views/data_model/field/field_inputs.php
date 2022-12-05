<?php

use crudle\app\main\enums\Type_Field_Input;
use icms\FomanticUI\Elements;
use icms\FomanticUI\modules\Checkbox;
use icms\FomanticUI\modules\Select;
use yii\helpers\Html;
use icms\FomanticUI\widgets\ActiveForm;

$isReadonly = $this->context->action->id == 'view';

$form = ActiveForm::begin([
    'id' => $rowId . '__modal',
    'enableClientValidation' => true,
    'options' => [
        'autocomplete' => 'off',
        'class' => 'ui form modal-form',
    ],
]);
?>
<div class="ui segment">
    <div class="ui two column grid">
        <div class="column">
            <?= Html::activeHiddenInput($model, "[$rowId]id", ['data-modal-input' => 'id']) ?>
            <?= Html::activeHiddenInput($model, "[$rowId]col_index", ['data-modal-input' => 'col_index']) ?>
            <?= Html::activeHiddenInput($model, "[$rowId]col_side", ['data-modal-input' => 'col_side']) ?>
            <?= Html::activeHiddenInput($model, "[$rowId]model_name", ['data-modal-input' => 'model_name']) ?>
            <?= $form
                ->field($model, "[$rowId]label")
                ->textInput([
                    'data-modal-input' => 'label',
                    'maxlength' => true,
                    'readonly' => $isReadonly
                ]) ?>
            <?= $form
                ->field($model, "[$rowId]field_name")
                ->textInput([
                    'data-modal-input' => 'field_name',
                    'maxlength' => true,
                    'readonly' => false
                ]) ?>
            <?= $form
                ->field($model, "[$rowId]field_type")->widget(Select::class, [
                    'items' => Type_Field_Input::enums(),
                    'search' => true,
                    'options' => [
                        'data' => ['modal-input' => 'field_type'],
                    ]
                ]) ?>
            <?= $form
                ->field($model, "[$rowId]db_type")->widget(Select::class, [
                    'items' => Type_Field_Input::enums(),
                    'search' => true,
                    'options' => [
                        'data' => ['modal-input' => 'db_type'],
                    ]
                ]) ?>
            <?= $form->field($model, "[$rowId]mandatory")
                ->widget(Checkbox::class, ['inputOptions' => ['data-modal-input' => 'mandatory']])
                ->label(false) ?>
            <?= $form->field($model, "[$rowId]unique")
                ->widget(Checkbox::class, ['inputOptions' => ['data-modal-input' => 'unique']])
                ->label(false) ?>
            <?= $form->field($model, "[$rowId]in_list_view")
                ->widget(Checkbox::class, ['inputOptions' => ['data-modal-input' => 'in_list_view']])
                ->label(false) ?>
            <?= $form
                ->field($model, "[$rowId]in_standard_filter")
                ->widget(Checkbox::class, ['inputOptions' => ['data-modal-input' => 'in_standard_filter']])
                ->label(false) ?>
            <?= $form
                ->field($model, "[$rowId]in_global_search")
                ->widget(Checkbox::class, ['inputOptions' => ['data-modal-input' => 'in_global_search']])
                ->label(false) ?>
            <?= $form->field($model, "[$rowId]bold")
                ->widget(Checkbox::class, ['inputOptions' => ['data-modal-input' => 'bold']])
                ->label(false) ?>
            <?= $form
                ->field($model, "[$rowId]allow_in_quick_entry")
                ->widget(Checkbox::class, ['inputOptions' => ['data-modal-input' => 'allow_in_quick_entry']])
                ->label(false) ?>
            <?= $form->field($model, "[$rowId]translatable")
                ->widget(Checkbox::class, ['inputOptions' => ['data-modal-input' => 'translatable']])
                ->label(false) ?>
            <?= $form
                ->field($model, "[$rowId]mandatory_depends_on")
                ->textInput([
                    'data-modal-input' => 'mandatory_depends_on',
                    'maxlength' => true,
                    'readonly' => $isReadonly
                ]) ?>
            <?= $form->field($model, "[$rowId]perm_level")->textInput(['data-modal-input' => 'perm_level']) ?>
            <?= $form
                ->field($model, "[$rowId]ignore_user_permissions")
                ->widget(Checkbox::class, ['inputOptions' => ['data-modal-input' => 'ignore_user_permissions']])
                ->label(false) ?>
            <?= $form
                ->field($model, "[$rowId]allow_on_submit")
                ->widget(Checkbox::class, ['inputOptions' => ['data-modal-input' => 'allow_on_submit']])
                ->label(false) ?>
            <?= $form->field($model, "[$rowId]report_hide")
                ->widget(Checkbox::class, ['inputOptions' => ['data-modal-input' => 'report_hide']])
                ->label(false) ?>
            <?= $form->field($model, "[$rowId]hidden")
                ->widget(Checkbox::class, ['inputOptions' => ['data-modal-input' => 'hidden']])
                ->label(false) ?>
            <?= $form->field($model, "[$rowId]readonly")
                ->widget(Checkbox::class, ['inputOptions' => ['data-modal-input' => 'readonly']])
                ->label(false) ?>
            <?= $form
                ->field($model, "[$rowId]readonly_depends_on")
                ->textInput([
                    'data-modal-input' => 'readonly_depends_on',
                    'maxlength' => true,
                    'readonly' => $isReadonly
                ]) ?>
        </div>
        <div class="column">
            <?= $form
                ->field($model, "[$rowId]default")
                ->textArea([
                    'data-modal-input' => 'default',
                    'style' => 'height: 124px',
                    'readonly' => $isReadonly
                ]) ?>
            <?= $form->field($model, "[$rowId]length")->textInput(['data-modal-input' => 'length']) ?>
            <?= $form
                ->field($model, "[$rowId]options", ['hintOptions' => ['class' => 'small']])
                ->textarea([
                    'data-modal-input' => 'options',
                    'style' => 'height: 120px',
                    'readonly' => $isReadonly
                ])
            // ->hint('For Select, enter list of Options, each on a new line.') 
            ?>
            <?= $form->field($model, "[$rowId]fetch_from")->textInput(['data-modal-input' => 'fetch_from']) ?>
            <?= $form->field($model, "[$rowId]fetch_if_empty")
                ->widget(Checkbox::class, ['inputOptions' => ['data-modal-input' => 'fetch_if_empty']])
                ->label(false) ?>
            <?= $form
                ->field($model, "[$rowId]depends_on")
                ->textInput([
                    'data-modal-input' => 'depends_on',
                    'maxlength' => true,
                    'readonly' => $isReadonly
                ]) ?>
            <?= $form
                ->field($model, "[$rowId]description")
                ->textArea([
                    'data-modal-input' => 'description',
                    'style' => 'height: 145px',
                    'readonly' => $isReadonly
                ]) ?>
            <?= $form->field($model, "[$rowId]in_filter")
                ->widget(Checkbox::class, ['inputOptions' => ['data-modal-input' => 'in_filter']])
                ->label(false) ?>
            <?= $form->field($model, "[$rowId]print_hide")
                ->widget(Checkbox::class, ['inputOptions' => ['data-modal-input' => 'print_hide']])
                ->label(false) ?>
            <?= $form->field($model, "[$rowId]print_width")->textInput(['data-modal-input' => 'print_width']) ?>
            <?= $form->field($model, "[$rowId]width")->textInput(['data-modal-input' => 'width']) ?>
        </div>
    </div>
</div>

<?= Elements::button('Update Field', [
    'class' => 'compact small update-row',
    'data'  => [
        'row-id' => $rowId
    ]
]);
ActiveForm::end();
