<?php

use crudle\main\enums\Type_Model;
use Zelenin\yii\SemanticUI\modules\Select;

?>

<div class="ui attached padded segment">
    <div class="ui two column grid">
        <div class="column">
            <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'type')->dropDownList([]) ?>
            <?= $form->field($model, 'data_model')->dropDownList([]) ?>
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
</div>