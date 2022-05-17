<?php

use crudle\app\setup\enums\Type_Model;
use crudle\app\setup\enums\Type_Widget;
?>
<div class="ui attached padded segment">
    <div class="ui two column grid">
        <div class="column">
            <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'type')->dropDownList(Type_Widget::enums()) ?>
            <?= $form->field($model, 'data_model')->dropDownList(Type_Model::enums()) ?>
            <?= $form->field($model, 'data_aggregate_function')->dropDownList([]) ?>
        </div>
        <div class="column">
            <?= $form->field($model, 'status')->checkbox(['class' => 'toggle'])->label('&nbsp;') ?>
            <br>
            <?= $form->field($model, 'group_by_column')->dropDownList([]) ?>
            <?= $form->field($model, 'show_filtered_data')->checkbox(['class' => 'toggle'])->label('&nbsp;') ?>
            <br>
            <?= $form->field($model, 'column_width')->dropDownList([]) ?>
        </div>
    </div>
</div>