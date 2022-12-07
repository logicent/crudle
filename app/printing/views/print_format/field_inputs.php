<?php

use crudle\app\main\enums\Type_Model;

$modelClasses = array_flip(Type_Model::modelClasses());
ksort($modelClasses);
?>

<div class="ui padded segment">
    <div class="ui two column grid">
        <div class="column">
            <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'inactive')->checkbox()->label('&nbsp;') ?>
        </div>
        <div class="column">
            <?= $form->field( $model, 'model_name' )->dropDownList( [
                    'Core' => 'Core'
                ]) ?>
            <?= $form->field( $model, 'module' )->dropDownList( [
                    'Core' => 'Core'
                ]) ?>
        </div>
    </div>
</div>
