<?php

use crudle\app\main\helpers\App;
use crudle\app\crud\helpers\SelectableItems;
use crudle\app\report\enums\Type_Report;
use crudle\app\user\models\Role;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use icms\FomanticUI\modules\Select;

$this->renderFile($this->context->viewPath . '/_breadcrumbs.php');

$rolesCount = !empty($model->roles) ? count($model->roles) : '0';
?>
    <div class="ui padded segment">
        <div class="ui two column grid">
            <div class="column">
                <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="column">
                <?= $form->field($model, 'inactive')->checkbox(['class' => 'toggle'])->label('&nbsp;') ?>
            </div>
        </div>
        <div class="ui one column grid">
            <div class="column">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'description')->textarea([
                        'rows' => 4,
                        'maxlength' => true,
                        'style' => 'resize: none; max-height: 7.875em;'
                    ]) ?>
            </div>
        </div>
    </div>

    <div class="ui padded segment">
        <div class="ui two column grid">
            <div class="column">
                <?= $form->field($model, 'group')->widget(Select::class, [
                        'search' => true,
                        'items' => ArrayHelper::merge([' ' => ''], App::getModuleList()),
                        'options' => [
                            'id' => 'rb__group',
                            'class' => 'load-related-list-options',
                            'data' => [
                                'url' => Url::to(['load-models-by-module']),
                                'dependent_field_count' => 'one',
                                'dependent_field_ref' => 'rb__model_name',
                            ]
                        ]
                    ])->label('Module') ?>
                <?= $form->field($model, 'model_name')->widget(Select::class, [
                        'search' => true,
                        'items' => ArrayHelper::merge([' ' => ''], App::getModels()),
                        'options' => [
                            'id' => 'rb__model_name',
                            'class' => 'load-related-list-options',
                            'data' => [
                                'url' => Url::to(['load-attributes-by-model']),
                                'dependent_field_count' => 'many',
                                'dependent_field_ref' => 'rb--attribute-name',
                            ]
                        ]
                    ])->label('Data model') ?>
                <?= $form->field($model, 'type')->widget(Select::class, [
                        'search' => true,
                        'items' => Type_Report::enums(),
                        'options' => ['id' => 'rb__type']
                    ]) ?>
            </div>
            <div class="column">
                <?= $form->field($model, 'roles')
                        ->checkboxList(
                            SelectableItems::get(Role::class, $model, [
                                'keyAttribute' => 'name',
                                'valueAttribute' => 'name',
                                'addEmptyFirstItem' => false,
                                'filters' => ['type' => 1, ['<>', 'name', 'Administrator']]
                            ]),
                            ['class' => 'custom-listbox report-role'])
                        ->label(
                            $model->getAttributeLabel('roles') .'&nbsp;('.
                            Html::tag('span', $rolesCount, [
                                'class' => 'selected-list-options',
                                'data' => ['count' => $rolesCount]
                            ]) . ')'
                        ) ?>
            </div>
        </div>
    </div>

    <?= $this->render('report_builder_item/index', ['model' => $model, 'form' => $form]) ?>
    <?= $this->render('_query_cmd', ['model' => $model, 'form' => $form]) ?>
<?php
$this->registerJs($this->render('@appMain/views/_form_field/load_related_list_options.js'));

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
JS);