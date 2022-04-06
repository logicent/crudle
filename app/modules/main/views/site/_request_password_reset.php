<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;

$this->title = Yii::t('app', 'Forgot password?');

$fieldOptions = [
    'options' => ['class' => 'form-group has-feedback'],
    // 'inputTemplate' => "{input}<span class='fa fa-envelope form-control-feedback'></span>"
] ?>

<div class="ui attached padded segment">
    <?= $form->field($model, 'email', $fieldOptions)
            ->label(false)
            ->textInput(['placeholder' => Yii::t('app', 'Your email address'), 'autofocus' => true]) ?>
</div>

<div class="ui bottom secondary attached right aligned padded segment">
    <?= Html::submitButton(Yii::t('app', 'Request reset'),
            ['class' => 'compact ui primary button']
        ) ?>
</div>

<div class="ui basic segment center aligned">
    <?= Html::a(Elements::icon('left arrow') .'&ensp;'. Yii::t('app', 'Back to Log in'),
                ['site/login'],
                ['class' => 'ui center aligned tiny grey forgot-pwd']) ?>
</div>