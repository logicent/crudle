<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;
use Zelenin\yii\SemanticUI\Elements;

$this->title = Yii::t('app', 'Forgot password?');

$fieldOptions = [
    'options' => ['class' => 'form-group has-feedback'],
    // 'inputTemplate' => "{input}<span class='fa fa-envelope form-control-feedback'></span>"
];
$form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

<div class="ui centered three column grid">
    <div class="six wide computer eight wide tablet sixteen wide mobile column">
        <div class="ui top secondary attached padded segment">
            <h4 class="ui header" style="font-weight: 500">
                <?= Elements::label('', ['class' => 'brown empty tiny circular'] ) ?>&ensp;<?= Html::encode( $this->title ) ?>
            </h4>
        </div>
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
    </div><!-- /.ui column -->

    <div class="ui centered row">
        <?= Html::a(Elements::icon('left arrow') .'&ensp;'. Yii::t('app', 'Back to Log in'), ['site/login'], ['id' => 'forgot_pwd', 'class' => 'ui center aligned tiny grey']) ?>
    </div>
</div><!-- /.ui centered three column grid -->

<?php ActiveForm::end(); ?>
