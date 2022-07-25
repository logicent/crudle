<?php

use crudle\app\main\enums\Column_Width;
use crudle\app\main\enums\Data_Aggregate_Function;
use crudle\app\setup\enums\Type_Model;
use crudle\app\main\enums\Type_Widget;
use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\modules\Radio;

?>
<div class="ui padded segment">
    <div class="ui two column grid">
        <div class="column">
            <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
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
            <?= $form->field($model, 'column_width')->dropDownList(Column_Width::enums()) ?>
            <?= $form->field($model, 'status')->checkbox(['class' => 'toggle'])->label('&nbsp;') ?>
        </div>
    </div>
</div>
<div class="ui padded segment">
    <div class="ui two column grid">
        <div class="column">
            <?= $form->field($model, 'data_model')->dropDownList(Type_Model::enums()) ?>
            <?= $form->field($model, 'data_aggregate_function')->dropDownList(Data_Aggregate_Function::enums()) ?>
        </div>
        <div class="column">
            <?= $form->field($model, 'group_by_column')->dropDownList([]) ?>
            <?= $form->field($model, 'show_filtered_data')->dropDownList([]) ?>
        </div>
    </div>
</div>
