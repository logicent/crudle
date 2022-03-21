<?php

use app\enums\Type_Model;
use Zelenin\yii\SemanticUI\modules\Select;

?>

<div class="ui attached padded segment">
    <div class="two fields">
        <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'inactive')->checkbox()->label('&nbsp;') ?>
    </div>
    <div class="two fields">
    </div>
</div>