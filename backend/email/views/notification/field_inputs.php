<?php

use crudle\app\main\enums\Type_Model;
use crudle\app\main\helpers\App;
use icms\FomanticUI\modules\Select;
?>

<div class="ui padded segment">
    <div class="two fields">
        <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'inactive')->checkbox()->label('&nbsp;') ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'data_model')->widget(Select::class, [
                'items' => App::getModelNames($includeChildModels = false, $flattenArray = true),
                'options' => ['maxlength' => true]
            ]) ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'from_address_field')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'to_address_field')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'cc_recipients_field')->textarea([
                'rows' => 3, 
                'style' => 'resize: none; height: 115px;'
            ]) ?>
    </div>
</div>
