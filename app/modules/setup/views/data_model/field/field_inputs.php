<?php

use app\modules\setup\models\DataModelField;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

$isReadonly = $this->context->action->id == 'view';

$form = ActiveForm::begin([
    'id' => $model->formName(),
    'enableClientValidation' => true,
    'options' => [
        'autocomplete' => 'off',
        'class' => 'ui form modal-form',
        'data' => [
            'modal_id' => 'field_modal'
        ]
    ],
]);

echo $this->render('//_form/_modal_header', ['model' => $model]) ?>

<div class="ui attached segment">
    <div class="ui two column grid">
        <div class="column">
            <?= Html::activeHiddenInput( $model, 'data_model' ) ?>
            <?= $form->field( $model, 'label' )->textInput(['maxlength' => true, 'readonly' => $isReadonly]) ?>
            <?= $form->field( $model, 'type' )->dropDownList(DataModelField::getListOptions()) ?>
            <?= $form->field( $model, 'name' )->textInput(['maxlength' => true, 'readonly' => false]) ?>

            <?= $form->field( $model, 'mandatory' )->checkbox() ?>
            <?= $form->field( $model, 'unique' )->checkbox() ?>
            <?= $form->field( $model, 'in_list_view' )->checkbox() ?>
            <?= $form->field( $model, 'in_standard_filter' )->checkbox() ?>
            <?= $form->field( $model, 'in_global_search' )->checkbox() ?>
            <?= $form->field( $model, 'bold' )->checkbox() ?>
            <?= $form->field( $model, 'allow_in_quick_entry' )->checkbox() ?>
            <?= $form->field( $model, 'translatable' )->checkbox() ?>
            <?= $form->field( $model, 'mandatory_depends_on' )->textInput(['maxlength' => true, 'readonly' => $isReadonly]) ?>
            <?= $form->field( $model, 'perm_level' )->textInput() ?>
            <?= $form->field( $model, 'ignore_user_permissions' )->checkbox() ?>
            <?= $form->field( $model, 'allow_on_submit' )->checkbox() ?>
            <?= $form->field( $model, 'report_hide' )->checkbox() ?>
            <?= $form->field( $model, 'hidden' )->checkbox() ?>
            <?= $form->field( $model, 'readonly' )->checkbox() ?>
            <?= $form->field( $model, 'readonly_depends_on' )->textInput(['maxlength' => true, 'readonly' => $isReadonly]) ?>
        </div>
        <div class="column">
            <?= $form->field( $model, 'default' )->textArea(['rows' => 5, 'style' => 'height: 112px', 'readonly' => $isReadonly]) ?>
            <?= $form->field( $model, 'length' )->textInput() ?>
            <?= $form->field( $model, 'options', ['hintOptions' => ['class' => 'small']] )->textarea(
                    [
                        'rows' => 5, 
                        'style' => 'height: 120px', 
                        'readonly' => $isReadonly
                    ])
                    // ->hint('For Select, enter list of Options, each on a new line.') ?>
            <?= $form->field( $model, 'fetch_from' )->textInput() ?>
            <?= $form->field( $model, 'fetch_if_empty' )->checkbox() ?>
            <?= $form->field( $model, 'depends_on' )->textInput(['maxlength' => true, 'readonly' => $isReadonly]) ?>
            <?= $form->field( $model, 'description' )->textArea(['rows' => 5, 'style' => 'height: 135px', 'readonly' => $isReadonly]) ?>
            <?= $form->field( $model, 'in_filter' )->checkbox() ?>
            <?= $form->field( $model, 'print_hide' )->checkbox() ?>
            <?= $form->field( $model, 'print_width' )->textInput() ?>
            <?= $form->field( $model, 'width' )->textInput() ?>
        </div>
    </div>
</div>

<?php ActiveForm::end();
$this->registerJs($this->render('//_form/_modal_submit.js')) ?>

