<?php

use Zelenin\yii\SemanticUI\modules\Select;
?>
<div class="ui attached padded segment">
    <div class="ui two column grid">
        <div class="column">
            <?= $form->field($model, 'homePage')->textInput(['maxlength' => 140]) ?>
            <?= $form->field($model, 'hideLogin')->checkbox() ?>
        </div>
        <div class="column">
            <?= $form->field($model, 'titlePrefix')->textInput(['maxlength' => 140]) ?>
            <?= $form->field($model, 'theme')->widget(Select::class, ['items' => []]) ?>
        </div>
    </div>
</div>
