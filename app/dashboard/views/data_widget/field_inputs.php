<?php

use crudle\app\main\helpers\App;
use crudle\app\main\enums\Column_Width;
use crudle\app\main\enums\Data_Aggregate_Function;
use crudle\app\setup\enums\Type_Model;
use crudle\app\main\enums\Type_Widget;
use icms\FomanticUI\Elements;
use icms\FomanticUI\modules\Radio;
use icms\FomanticUI\modules\Select;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
$attributes = [];
if (!$model->isNewRecord) :
    $fieldModel = new $model->data_model;
    
    foreach ($fieldModel->attributes() as $attribute) :
        $attributes[$attribute] = $fieldModel->getAttributeLabel($attribute);
    endforeach;
    array_multisort($attributes);
endif;
?>
<div class="ui padded segment">
    <div class="ui two column grid">
        <div class="column">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'type')->radioList(Type_Widget::enumIcons(), [
                    'item' => function ($index, $label, $name, $checked, $value) {
                        return
                            Radio::widget([
                                'name' => $name,
                                'checked' => $checked,
                                'label' => Elements::icon($label . ' big', ['style' => 'font-size: 3em;']),
                                'inputOptions' => [
                                    'value' => $value,
                                ],
                                'options' => [
                                    'title' => $value
                                ],
                            ]);
                    }
                ]) ?>
        </div>
        <div class="column">
            <?php //= $form->field($model, 'column_width')->dropDownList(Column_Width::enums()) ?>
            <?= $form->field($model, 'status')->checkbox(['class' => 'toggle'])->label('&nbsp;') ?>
        </div>
    </div>
</div>
<div class="ui padded segment">
    <div class="ui two column grid">
        <div class="column">
            <?= $form->field($model, 'data_model')->widget(Select::class, [
                        'search' => true,
                        'items' => ArrayHelper::merge([' ' => ''], App::getModels()),
                        'options' => [
                            'id' => 'rb__model_name',
                            'class' => 'load-related-list-options',
                            'data' => [
                                'url' => Url::to(['load-attributes-by-model','tag' => 'div','value' => 'data-value']),
                                'dependent_field_count' => 'many',
                                'dependent_field_ref' => 'rb--attribute-name',
                            ]
                        ]
                    ])->label('Data model') ?>
            
            <?= $form->field($model, 'data_aggregate_function')->dropDownList(Data_Aggregate_Function::enums()) ?>
        </div>
        <div class="column">
        <?= Html::activeLabel($model, 'group_by_column') ?>
        <?= Html::activeDropDownList($model, "group_by_column", 
                $attributes,
                [
                    'class' => 'rb--attribute-name',
                    'data-name' => 'attributeName'
                ]
            ) ?>
            <?= $form->field($model, 'show_filtered_data')->dropDownList([]) ?>
        </div>
    </div>
</div>
<?php
$this->registerJs($this->render('@appMain/views/_form_field/load_related_list_options.js'));