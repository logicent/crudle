<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;
use Zelenin\yii\SemanticUI\Elements;

$this->title = Yii::t('app', 'Reset password');

$fieldOptions = [
    'options' => ['class' => 'form-group has-feedback'],
    // 'inputTemplate' => "{input}<span class='fa fa-lock form-control-feedback'></span>"
];
$form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

<div class="ui centered three column grid">
    <div class="six wide computer eight wide tablet sixteen wide mobile column">
        <div class="ui top secondary attached padded segment">
            <h4 class="ui header" style="font-weight: 500">
                <?= Elements::label('', ['class' => 'brown empty tiny circular'] ) ?>&ensp;<?= Html::encode( $this->title ) ?>
            </h4>
        </div>
        <div class="ui attached padded segment">
            <?= $form->field($model, 'password', $fieldOptions)
                    ->label(false)
                    ->passwordInput(['placeholder' => Yii::t('app', 'New Password'), 'autofocus' => true]) ?>
        </div>
        <div class="ui bottom secondary attached right aligned padded segment">
            <?= Html::submitButton(Yii::t('app', 'Reset password'), ['class' => 'compact ui primary button']) ?>
        </div>
    </div><!-- /.ui column -->
</div><!-- /.ui centered three column grid -->

<?php ActiveForm::end(); ?>
