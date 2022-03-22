<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Reset password');


$fieldOptions = [
    'options' => ['class' => 'form-group has-feedback'],
    // 'inputTemplate' => "{input}<span class='fa fa-lock form-control-feedback'></span>"
] ?>

<div class="ui attached padded segment">
    <?= $form->field($model, 'password', $fieldOptions)
            ->label(false)
            ->passwordInput(['placeholder' => Yii::t('app', 'New Password'), 'autofocus' => true]) ?>
</div>

<div class="ui bottom secondary attached right aligned padded segment">
    <?= Html::submitButton(Yii::t('app', 'Reset password'),
            ['class' => 'compact ui primary button']) ?>
</div>