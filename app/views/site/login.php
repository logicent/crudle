<?php

use app\modules\setup\models\BusinessProfileForm;
use app\modules\setup\models\Setup;
use yii\helpers\Html;

use Zelenin\yii\SemanticUI\widgets\ActiveForm;
use Zelenin\yii\SemanticUI\Elements;

$this->title = Yii::t('app', 'Log in');
$this->params['breadcrumbs'][] = $this->title;

$businessProfile = Setup::getSettings( BusinessProfileForm::class );
$this->params['businessLogo'] = $businessProfile->logoPath;
$this->params['businessName'] = $businessProfile->name;

$form = 
    ActiveForm::begin([
        'id' => 'login-form',
        'enableClientValidation' => false,
        'options' => [
            'autocomplete' => 'off',
            'class' => 'ui form',
        ],
    ]); ?>

<div class="ui centered three column grid">
<?php
    if (!empty($this->params['businessLogo'])) : ?>
    <div class="ui centered row logo">
        <img class="ui small image" src="<?= Yii::getAlias('@web/uploads/') . $this->params['businessLogo']?>">
    </div>
<?php
    endif ?>
    <div class="six wide computer eight wide tablet sixteen wide mobile column">
        <div class="ui top secondary attached padded segment">
            <h4 class="ui header" style="font-weight: 500">
                <?= Elements::label('', ['class' => 'brown empty tiny circular'] ) ?>&ensp;<?= Html::encode( $this->title ) ?>
            </h4>
        </div>
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
    </div>
    <div class="ui centered row">
        <?= Html::a(Yii::t('app', 'Forgot password?'),
                ['site/request-password-reset'],
                ['id' => 'forgot_pwd', 'class' => 'ui center aligned grey']
            ) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
