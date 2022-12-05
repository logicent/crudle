<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Log in');
?>

<div class="ui attached padded segment">
    <?= $form->field($model, 'username')->textInput(['placeholder' => Yii::t('app', 'Username or Email address'), 'autofocus' => true])->label(false) ?>
    <?= $form->field($model, 'password')->passwordInput(['placeholder' => Yii::t('app', 'Password')])->label(false) ?>
    <?= $form->field($model, 'rememberMe')->checkbox(['class' => 'toggle']) ?>
</div>

<div class="ui bottom secondary attached right aligned padded segment">
    <?= Html::submitButton('Log in', [
            'class' => 'compact ui primary button', 
            'name' => 'login-button',
            'style' => 'margin-right: 0em'
        ]) ?>
</div>

<div class="ui basic segment center aligned">
    <?= Html::a(Yii::t('app', 'Forgot password?'),
            ['app/request-password-reset'],
            ['id' => 'forgot_pwd', 'class' => 'ui center aligned grey']
        ) ?>
</div>