<?php

use app\enums\Type_Model;

$modelClasses = array_merge(Type_Model::domainModelClass(), Type_Model::domainModelSubclass());
$modelClasses = array_flip($modelClasses);
ksort($modelClasses);
?>

<div class="ui attached padded segment">
    <div class="two fields">
        <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'inactive')->checkbox()->label('&nbsp;') ?>
    </div>
</div>
