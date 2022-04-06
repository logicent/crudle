<?php

use yii\helpers\Html;

?>

<div class="ui attached padded segment">
    <div class="two fields">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'shortName')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'location')->textarea(['rows' => 4]) ?>
        <?= $form->field($model, 'contacts')->textarea(['rows' => 4]) ?>
    </div>
</div>

<div class="ui attached padded segment">
    <div class="two fields">
        <?= $form->field($model, 'defaultLanguage')->dropDownList([], ['disabled' => true]) ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'firstDayOfTheWeek')->dropDownList(['sun' => 'Sun', 'mon' => 'Mon'], ['disabled' => true]) ?>
        <?= $form->field($model, 'defaultTimeZone')->dropDownList([], ['disabled' => true]) ?>
    </div>
    <div class="two fields">
        <?= $form->field($model, 'defaultDateFormat')->textInput(['readonly' => true, 'class' => 'datePicker']) ?>
        <?= $form->field($model, 'defaultTimeFormat')->textInput(['readonly' => true, 'class' => 'timePicker']) ?>
    </div>
</div>

<div class="ui attached padded segment">
    <div class="ui two column stackable grid">
        <div class="column center aligned">
            <?= $this->render( '@app_main/views/_form_field/file_input', [
                    'attribute' => 'logoPath',
                    'model' => $model,
                    'form' => $form,
                    'placeholder' => '/img/placeholder-logo.jpg'
                ]) ?>
        </div>
    </div>
</div>