<?php

use yii\helpers\Html;
use yii\helpers\Inflector;
use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;


$subView = Inflector::underscore(Inflector::id2camel($this->context->action->id));

$form = ActiveForm::begin([
        'id' => $this->context->action->id . '-form',
        'enableClientValidation' => false,
        'options' => [
            'autocomplete' => 'off',
            'class' => 'ui form',
        ],
    ]) ?>

<div class="ui centered three column grid">
<?php
    if (!empty($this->params['businessLogo'])) : ?>
    <div class="ui centered row logo">
        <img class="ui small image" src="<?= Yii::getAlias('@web/uploads/') . $this->params['businessLogo']?>">
    </div>
<?php
    endif ?>
    <div class="six wide computer eight wide tablet sixteen wide mobile column">
        <div class="login">
            <div class="ui top secondary attached padded segment">
                <h4 class="ui header" style="font-weight: 500">
                    <?= Elements::label('', ['class' => 'brown empty tiny circular'] ) ?>&ensp;<?= Html::encode( $this->title ) ?>
                </h4>
            </div>
            <?= $this->render('_field_inputs_' . $subView, ['form' => $form, 'model' => $model]) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>