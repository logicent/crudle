<?php

use yii\helpers\Html;

?>

<div class="ui attached padded segment">
    <?= Html::activeHiddenInput($model, 'organization_id', [
            'value' => $model->isNewRecord ? Yii::$app->user->identity->person->organization_id : $model->organization_id,
    ]) ?>
    <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'message')->textarea([
            'rows' => 5, 
            'style' => 'resize: none; height: 115px;'
        ]) ?>
    <?= $form->field($model, 'inactive')->checkbox() ?>
</div>
