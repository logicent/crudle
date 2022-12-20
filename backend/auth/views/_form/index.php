<?php

use crudle\app\setting\forms\GeneralSettingsForm;
use crudle\app\setting\models\Setup;
use yii\helpers\Html;
use yii\helpers\Inflector;
use icms\FomanticUI\Elements;
use icms\FomanticUI\widgets\ActiveForm;

$businessProfile = Setup::getSettings( GeneralSettingsForm::class );
$this->params['businessLogo'] = $businessProfile->logoPath;
$this->params['businessName'] = $businessProfile->name;

// $subView = Inflector::underscore(Inflector::id2camel($this->context->action->id));
?>

<div class="login-wrapper">

<?php
$form = ActiveForm::begin([
        'id' => $this->context->action->id . '-form',
        'enableClientValidation' => false,
        'options' => [
            'autocomplete' => 'off',
            'class' => 'ui form',
        ],
    ]);

    $fieldInputs = $this->renderFile($this->context->viewPath . '/field_inputs.php', ['form' => $form, 'model' => $model]);
?>

<div class="ui centered three column grid">
<?php
    if (!empty($this->params['businessLogo'])) : ?>
    <div class="ui centered row logo">
        <img class="ui image" src="<?= Yii::getAlias('@web/uploads/') . $this->params['businessLogo']?>">
    </div>
<?php
    endif ?>
    <div class="six wide computer eight wide tablet sixteen wide mobile column">
        <div class="login">
            <div class="ui top secondary attached padded segment">
                <h4 class="ui header" style="font-weight: 500">
                    <?= Elements::label('', ['class' => 'brown empty tiny circular'] ) ?>&ensp;<?= Html::encode($this->title) ?>
                </h4>
            </div>
            <?= $fieldInputs ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
</div>

<?php $this->registerCss($this->renderFile('@appModules/auth/assets/login.css'));