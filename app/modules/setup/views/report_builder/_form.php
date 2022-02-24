<?php

use app\enums\Type_Model;
use app\enums\Type_Module;
use app\enums\Type_Report;
use app\enums\Type_Role;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\modules\Select;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;


$modelClasses = array_merge(Type_Model::domainModelClass(), Type_Model::domainModelSubclass());
$modelClasses = array_flip($modelClasses);
ksort($modelClasses);
$rolesCount = !empty($model->roles) ? count($model->roles) : '0';

$form = ActiveForm::begin([
    'id' => $model->formName(),
    'enableClientValidation' => true,
    'options' => [
        'autocomplete' => 'off',
        'class' => 'ui form modal-form',
    ],
]);

echo $this->render('//_form/_modal_header', ['model' => $model]) ?>

    <div class="ui attached padded segment">
        <div class="two fields">
            <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'inactive')->checkbox()->label('&nbsp;') ?>
        </div>
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'description')->textarea(['rows' => 3, 'maxlength' => true]) ?>
        <div class="two fields">
            <?= $form->field($model, 'group')->widget(Select::class, [
                    'search' => true,
                    'items' => Type_Module::enums(),
                    'options' => ['id' => 'rb__group']
                ]) ?>
            <?= $form->field($model, 'type')->widget(Select::class, [
                    'search' => true,
                    'items' => Type_Report::enums(),
                    'options' => ['id' => 'rb__type']
                ]) ?>
        </div>
        <div class="two fields">
            <?= $form->field($model, 'model_name')->widget(Select::class, [
                    'search' => true,
                    'items' => $modelClasses,
                    'options' => ['id' => 'rb__model_name']
                ]) ?>
        </div>
    </div>

    <?= $this->render('column/list', ['model' => $model, 'form' => $form]) ?>

    <div class="ui attached padded segment">
        <div class="two fields">
            <?= $form->field($model, 'roles')
                    ->checkboxList(Type_Role::domainRoles(), ['class' => 'custom-listbox report-role'])
                    ->label(
                        $model->getAttributeLabel('roles') .'&nbsp;('.
                        Html::tag('span', $rolesCount,
                                [
                                    'class' => 'selected-list-options',
                                    'data' => ['count' => $rolesCount]
                                ]) . ')'
                    ) ?>
        </div>
    </div>

    <div class="ui attached padded segment">
        <?= $form->field($model, 'query_cmd')->textarea(['rows' => 8]) ?>

        <?= Elements::button(Yii::t('app', 'Test query'), [
                'id' => 'test_connection',
                'class' => 'compact ui small button',
                'data' => ['url' => 'test-query']
            ]) ?>
    </div>

<?php ActiveForm::end();
echo $this->render('//_form/_footer', ['model' => $model]);
$this->registerJs($this->render('//_form/_modal_submit.js'));

$this->registerJs(<<<JS
    $('.custom-listbox').on('click', function() {
        count = 0;
        items = $(this).find('.ui.checkbox');
        items.each(function(i) {
            item = $(this).find('input');
            if (item.prop('checked')) // == true
                count += 1;
        });
        selectedCount = $(this).siblings('label').children('span.selected-list-options');
        selectedCount.text(count);
    });
JS
);