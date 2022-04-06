<?php

use app\modules\main\enums\Type_Model;

$modelClasses = array_flip(Type_Model::modelClasses());
ksort($modelClasses);
?>

<div class="ui attached padded segment">
    <div class="two fields">
        <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'inactive')->checkbox()->label('&nbsp;') ?>
    </div>
    <div class="two fields">
    </div>
    <div class="two fields">
    </div>
</div>

<div class="ui attached padded segment">
    <div class="two fields">
    </div>
</div>

<div class="ui attached padded segment">
</div>